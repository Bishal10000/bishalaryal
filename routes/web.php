<?php

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

$staticPage = function (string $file) {
    return response()->file(base_path($file));
};

Route::redirect('/', '/index.html');

Route::get('/index.html', fn () => $staticPage('index.html'))->name('home');
Route::get('/articles.html', function () {
    $baseQuery = Post::published()->with(['author', 'category', 'tags']);

    $featuredPost = (clone $baseQuery)->latestFirst()->first();
    $vscodePost = (clone $baseQuery)
        ->where('title', 'like', 'VS Code Extensions%')
        ->latestFirst()
        ->first();
    $highlightedPost = $vscodePost ?? $featuredPost;
    $latestPosts = (clone $baseQuery)
        ->latestFirst()
        ->when($highlightedPost, fn ($builder) => $builder->whereKeyNot($highlightedPost->id))
        ->take(9)
        ->get();

    $categories = \App\Models\Category::withCount(['posts' => fn ($builder) => $builder->published()])->orderByDesc('posts_count')->get();
    $tags = \App\Models\Tag::withCount(['posts' => fn ($builder) => $builder->published()])->orderByDesc('posts_count')->take(8)->get();
    $author = $highlightedPost?->author ?? $latestPosts->first()?->author;

    return view('blog.index', compact('featuredPost', 'highlightedPost', 'latestPosts', 'categories', 'tags', 'author'));
})->name('articles.index');
Route::get('/article-single.html', fn () => $staticPage('article-single.html'))->name('articles.show');
Route::get('/article-vscode-extensions.html', fn () => $staticPage('article-vscode-extensions.html'))->name('articles.vscode-extensions');
Route::get('/about.html', fn () => $staticPage('about.html'))->name('about');
Route::get('/newsletter.html', fn () => $staticPage('newsletter.html'))->name('newsletter');
Route::get('/vscode-extensions-carousel.html', fn () => $staticPage('vscode-extensions-carousel.html'))->name('articles.vscode-extensions.carousel');
Route::get('/programmer-websites-bookmark.html', fn () => $staticPage('programmer-websites-bookmark.html'))->name('articles.programmer-websites-bookmark');

// Note: Blog listing removed; posts remain available at /posts/{slug}.
Route::get('/posts/{post:slug}', function (Post $post) {
    $publishedPosts = Post::published()
        ->latestFirst()
        ->with(['author', 'category', 'tags', 'comments'])
        ->get();

    $currentIndex = $publishedPosts->search(fn (Post $item) => $item->is($post));

    $post = $post->loadMissing(['author', 'category', 'tags', 'comments']);
    $isVscodePost = $post->slug === 'VS Code Extensions that make coding easier';
    $isProgrammerWebsitesPost = $post->slug === '5-websites-every-programmer-should-bookmark';
    $shouldRenderBody = trim(strip_tags($post->body ?? '')) !== 'PLACEHOLDER';
    $bodyHtml = $shouldRenderBody ? $post->body : null;

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

    return view('posts.show', [
        'post' => $post,
        'previousPost' => $currentIndex !== false ? $publishedPosts->get($currentIndex - 1) : null,
        'nextPost' => $currentIndex !== false ? $publishedPosts->get($currentIndex + 1) : null,
        'relatedPosts' => $publishedPosts->where('id', '!=', $post->id)->take(3),
        'isVscodePost' => $isVscodePost,
        'isProgrammerWebsitesPost' => $isProgrammerWebsitesPost,
        'shouldRenderBody' => $shouldRenderBody,
        'bodyHtml' => $bodyHtml,
        'toc' => $toc,
    ]);
})->name('posts.show');
Route::get('/categories/{category:slug}', fn () => $staticPage('articles.html'))->name('categories.show');
Route::get('/tags/{tag:slug}', fn () => $staticPage('articles.html'))->name('tags.show');
Route::get('/search', fn () => $staticPage('articles.html'))->name('search');
Route::post('/newsletter', fn () => redirect('/newsletter.html'))->name('newsletter.subscribe');
Route::post('/posts/{post:slug}/comments', fn () => redirect('/article-single.html'))->name('posts.comments.store');
Route::get('/feed', fn () => redirect('/index.html'))->name('blog.feed.page');
Route::get('/rss.xml', fn () => response('Not implemented', 204))->name('blog.feed');
Route::get('/sitemap.xml', fn () => response('Not implemented', 204))->name('sitemap');

Route::get('/about', fn () => $staticPage('about.html'));

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/project-preview/{slug}', function (string $slug) {
    $projects = [
        'hamro-bhansa' => [
            'title' => 'Hamro-bhansa',
            'description' => 'Web application project from my GitHub profile.',
            'github_url' => 'https://github.com/Bishal10000/Hamro-bhansa',
            'stack' => ['PHP', 'Web App'],
        ],
        'exam-hub' => [
            'title' => 'Exam-hub',
            'description' => 'Exam platform project from my GitHub profile.',
            'github_url' => 'https://github.com/Bishal10000/Exam-hub',
            'stack' => ['PHP', 'Education'],
        ],
        'blood-donor-management' => [
            'title' => 'Blood-Donor-Management',
            'description' => 'A web-based platform connecting blood donors with recipients in specific regions.',
            'github_url' => 'https://github.com/Bishal10000/Blood-Donor-Management',
            'stack' => ['PHP', 'Laravel', 'MySQL'],
        ],
        'bishalaryal' => [
            'title' => 'bishalaryal',
            'description' => 'Personal portfolio repository.',
            'github_url' => 'https://github.com/Bishal10000/bishalaryal',
            'stack' => ['Laravel', 'Blade', 'Tailwind CSS'],
            'external_live_url' => 'https://bishal10.com.np',
        ],
        'fundhive' => [
            'title' => 'fundhive',
            'description' => 'Crowdfunding platform repository from my GitHub profile.',
            'github_url' => 'https://github.com/Bishal10000/fundhive',
            'stack' => ['PHP', 'Laravel', 'MySQL'],
        ],
    ];

    abort_unless(isset($projects[$slug]), 404);

    return view('project-preview', [
        'project' => $projects[$slug],
        'slug' => $slug,
    ]);
})->name('project.preview');

Route::get('/skills', function () {
    return view('skills');
});

Route::get('/process', function () {
    return view('process');
});

Route::get('/contact', function () {
    return view('contact');
});

