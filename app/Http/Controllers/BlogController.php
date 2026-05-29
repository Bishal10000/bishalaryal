<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\NewsletterSubscriber;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class BlogController extends Controller
{
    public function index()
    {
        $baseQuery = Post::published()->with(['author', 'category', 'tags']);

        $featuredPost = (clone $baseQuery)->latestFirst()->first();
        $latestPosts = (clone $baseQuery)
            ->latestFirst()
            ->when($featuredPost, fn ($builder) => $builder->whereKeyNot($featuredPost->id))
            ->take(9)
            ->get();

        $categories = Category::withCount(['posts' => fn ($builder) => $builder->published()])->orderByDesc('posts_count')->get();
        $tags = Tag::withCount(['posts' => fn ($builder) => $builder->published()])->orderByDesc('posts_count')->take(8)->get();
        $author = $featuredPost?->author ?? $latestPosts->first()?->author;

        return view('home', compact('featuredPost', 'latestPosts', 'categories', 'tags', 'author'));
    }

    public function show(Post $post)
    {
        abort_unless($post->published_at, 404);

        $post->load(['author', 'category', 'tags', 'comments' => fn ($builder) => $builder->approved()->latest()]);

        $previousPost = Post::published()
            ->where('published_at', '<', $post->published_at)
            ->latestFirst()
            ->first();

        $nextPost = Post::published()
            ->where('published_at', '>', $post->published_at)
            ->oldest('published_at')
            ->first();

        $relatedPosts = Post::published()
            ->whereKeyNot($post->id)
            ->where(function ($builder) use ($post) {
                $builder->where('category_id', $post->category_id)
                    ->orWhereHas('tags', fn ($tagQuery) => $tagQuery->whereIn('tags.id', $post->tags->pluck('id')));
            })
            ->with(['category'])
            ->latestFirst()
            ->take(3)
            ->get();

        // Special rendering flags used by the posts.show view
        $isVscodePost = $post->slug === 'VS Code Extensions that make coding easier';
        $shouldRenderBody = trim(strip_tags($post->body ?? '')) !== 'PLACEHOLDER';
        $bodyHtml = $shouldRenderBody ? $post->body : null;

        // Build a lightweight table of contents from H2/H3 headings in the post body
        $toc = [];
        if ($shouldRenderBody && $bodyHtml) {
            if (preg_match_all('/<h([23])(?:[^>]*)>(.*?)<\/h\1>/i', $bodyHtml, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $m) {
                    $label = trim(strip_tags($m[2]));
                    if ($label === '') continue;
                    $id = Str::slug($label);
                    $toc[] = ['href' => '#' . $id, 'label' => $label];
                }
            }
        }

        return view('posts.show', compact('post', 'previousPost', 'nextPost', 'relatedPosts', 'isVscodePost', 'shouldRenderBody', 'bodyHtml', 'toc'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->published()->with(['author', 'tags'])->latestFirst()->paginate(9);

        return view('archive', [
            'title' => $category->name,
            'subtitle' => 'Stories in ' . $category->name,
            'posts' => $posts,
            'kind' => 'category',
        ]);
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->published()->with(['author', 'category'])->latestFirst()->paginate(9);

        return view('archive', [
            'title' => '#' . $tag->name,
            'subtitle' => 'Posts tagged with ' . $tag->name,
            'posts' => $posts,
            'kind' => 'tag',
        ]);
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:120'],
        ]);

        $term = trim($validated['q'] ?? '');

        if ($term === '') {
            return response()->json(['results' => []]);
        }

        $results = Post::published()
            ->with('category')
            ->where(function ($builder) use ($term) {
                $builder->where('title', 'like', '%' . $term . '%')
                    ->orWhere('excerpt', 'like', '%' . $term . '%')
                    ->orWhere('body', 'like', '%' . $term . '%');
            })
            ->latestFirst()
            ->take(6)
            ->get()
            ->map(fn (Post $post) => [
                'title' => $post->title,
                'slug' => $post->slug,
                'excerpt' => $post->teaser(),
                'thumbnail' => $post->thumbnailUrl(),
                'category' => $post->category?->name,
                'reading_time' => $post->readingTimeMinutes(),
                'url' => route('posts.show', $post),
            ]);

        return response()->json(['results' => $results]);
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email:rfc,dns', 'max:255'],
        ]);

        NewsletterSubscriber::firstOrCreate(['email' => $validated['email']]);

        return back()->with('newsletter_status', 'You are now subscribed.');
    }

    public function comment(Request $request, Post $post)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'body' => ['required', 'string', 'min:20', 'max:4000'],
        ]);

        $post->comments()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'body' => $validated['body'],
            'approved_at' => now(),
        ]);

        return back()->with('comment_status', 'Your comment is now visible.');
    }

    public function feed()
    {
        $posts = Post::published()->with(['author', 'category'])->latestFirst()->take(20)->get();
        $siteName = config('app.name');
        $blogUrl = route('blog.index');

        $items = $posts->map(function (Post $post): string {
            return <<<XML
            <item>
                <title><![CDATA[{$post->title}]]></title>
                <link>{$post->absoluteUrl()}</link>
                <guid>{$post->absoluteUrl()}</guid>
                <description><![CDATA[{$post->excerpt}]]></description>
                <pubDate>{$post->published_at?->toRssString()}</pubDate>
            </item>
            XML;
        })->implode("\n");

        $xml = <<<XML
        <?xml version="1.0" encoding="UTF-8"?>
        <rss version="2.0">
            <channel>
                <title><![CDATA[{$siteName}]]></title>
                <link>{$blogUrl}</link>
                <description><![CDATA[A premium editorial blog powered by Laravel.]]></description>
                <language>en-us</language>
                {$items}
            </channel>
        </rss>
        XML;

        return response(trim($xml), 200, ['Content-Type' => 'application/rss+xml; charset=UTF-8']);
    }

    public function feedPage()
    {
        return view('feeds.index', [
            'feedUrl' => route('blog.feed'),
        ]);
    }

    public function sitemap()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create(route('home')))
            ->add(Url::create(route('blog.index')))
            ->add(Url::create(route('blog.feed')));

        Post::published()->select('slug', 'updated_at')->chunk(50, function ($posts) use ($sitemap) {
            foreach ($posts as $post) {
                $sitemap->add(Url::create(route('posts.show', $post))->setLastModificationDate($post->updated_at));
            }
        });

        Category::all()->each(function (Category $category) use ($sitemap) {
            $sitemap->add(Url::create(route('categories.show', $category)));
        });

        Tag::all()->each(function (Tag $tag) use ($sitemap) {
            $sitemap->add(Url::create(route('tags.show', $tag)));
        });

        return response($sitemap->writeToString(), 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }
}
