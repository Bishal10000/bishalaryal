<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\NewsletterSubscriber;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $author = User::updateOrCreate(
                ['email' => 'bishalaryal975@gmail.com'],
                [
                    'name' => 'Bishal Aryal',
                    'password' => 'Bishal@10',
                    'bio' => 'I write about the intersection of design, engineering, and editorial storytelling for modern web experiences.',
                    'role' => 'Admin',
                    'email_verified_at' => now(),
                ]
            );

            $categories = collect([
                ['name' => 'Design Systems', 'slug' => 'design-systems', 'color' => '#6366F1', 'icon' => '✦'],
                ['name' => 'Product Strategy', 'slug' => 'product-strategy', 'color' => '#F59E0B', 'icon' => '◆'],
                ['name' => 'Laravel Craft', 'slug' => 'laravel-craft', 'color' => '#0F172A', 'icon' => 'L'],
                ['name' => 'Content Ops', 'slug' => 'content-ops', 'color' => '#8B5CF6', 'icon' => '◌'],
            ])->map(fn (array $category) => Category::create($category));

            $tags = collect([
                'Laravel', 'Blade', 'Tailwind', 'SEO', 'Editorial', 'Performance', 'Accessibility', 'Animation', 'DX', 'AI',
            ])->map(fn (string $name) => Tag::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]));

            $posts = collect([
                [
                    'title' => 'How modern editorial design turns visitors into readers',
                    'slug' => 'modern-editorial-design-turns-visitors-into-readers',
                    'excerpt' => 'A premium blog is not just content. It is pacing, contrast, whitespace, typography, and trust working together in every viewport.',
                    'category' => 'design-systems',
                    'thumbnail' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&w=1200&q=80',
                    'published_at' => now()->subDays(2),
                    'tags' => ['Editorial', 'Design Systems', 'Accessibility'],
                ],
                [
                    'title' => 'Building a Laravel blog that feels handcrafted',
                    'slug' => 'building-a-laravel-blog-that-feels-handcrafted',
                    'excerpt' => 'The difference between a working blog and a memorable one is usually in the details that are invisible in a checklist.',
                    'category' => 'laravel-craft',
                    'thumbnail' => 'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?auto=format&fit=crop&w=1200&q=80',
                    'published_at' => now()->subDays(4),
                    'tags' => ['Laravel', 'Blade', 'Performance'],
                ],
                [
                    'title' => 'Why search UX matters more than your latest headline',
                    'slug' => 'why-search-ux-matters-more-than-your-latest-headline',
                    'excerpt' => 'A live search surface can quietly become the most useful part of the homepage when it responds instantly and feels intelligent.',
                    'category' => 'product-strategy',
                    'thumbnail' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
                    'published_at' => now()->subDays(6),
                    'tags' => ['Product Strategy', 'SEO', 'DX'],
                ],
                [
                    'title' => 'Micro-animations that make interfaces feel expensive',
                    'slug' => 'micro-animations-that-make-interfaces-feel-expensive',
                    'excerpt' => 'Subtle transitions, easing curves, and hover states are the visual equivalent of polished copy editing.',
                    'category' => 'design-systems',
                    'thumbnail' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1200&q=80',
                    'published_at' => now()->subDays(8),
                    'tags' => ['Animation', 'Accessibility', 'Tailwind'],
                ],
                [
                    'title' => 'SEO metadata for content sites without the bloat',
                    'slug' => 'seo-metadata-for-content-sites-without-the-bloat',
                    'excerpt' => 'You do not need a hundred plugins to get Open Graph, structured metadata, and indexable content right.',
                    'category' => 'content-ops',
                    'thumbnail' => 'https://images.unsplash.com/photo-1487058792275-0ad4aaf24ca7?auto=format&fit=crop&w=1200&q=80',
                    'published_at' => now()->subDays(10),
                    'tags' => ['SEO', 'Laravel', 'Content Ops'],
                ],
                [
                    'title' => 'How to write article layouts people actually finish reading',
                    'slug' => 'how-to-write-article-layouts-people-actually-finish-reading',
                    'excerpt' => 'Readable line length, generous spacing, and a clear reading path matter more than almost any decorative flourish.',
                    'category' => 'content-ops',
                    'thumbnail' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=1200&q=80',
                    'published_at' => now()->subDays(12),
                    'tags' => ['Editorial', 'Accessibility', 'Performance'],
                ],
                [
                    'title' => 'Dashboard-grade components on a public-facing website',
                    'slug' => 'dashboard-grade-components-on-a-public-facing-website',
                    'excerpt' => 'High-density interfaces can still feel luxurious when cards, data, and hierarchy are choreographed well.',
                    'category' => 'product-strategy',
                    'thumbnail' => 'https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=1200&q=80',
                    'published_at' => now()->subDays(14),
                    'tags' => ['Blade', 'Tailwind', 'DX'],
                ],
                [
                    'title' => 'The quiet power of a strong author bio',
                    'slug' => 'the-quiet-power-of-a-strong-author-bio',
                    'excerpt' => 'Readers trust a site faster when the author page feels intentional, specific, and socially connected.',
                    'category' => 'content-ops',
                    'thumbnail' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1200&q=80',
                    'published_at' => now()->subDays(16),
                    'tags' => ['Editorial', 'SEO', 'Design Systems'],
                ],
                [
                    'title' => 'Why content architecture should come before visuals',
                    'slug' => 'why-content-architecture-should-come-before-visuals',
                    'excerpt' => 'A beautiful theme only works when the information architecture gives it a clear narrative to follow.',
                    'category' => 'product-strategy',
                    'thumbnail' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1200&q=80',
                    'published_at' => now()->subDays(18),
                    'tags' => ['Product Strategy', 'Accessibility', 'Laravel'],
                ],
                [
                    'title' => 'Designing newsletters that feel like a membership perk',
                    'slug' => 'designing-newsletters-that-feel-like-a-membership-perk',
                    'excerpt' => 'Subscription forms work better when they promise taste, not spam, and honor that promise in the UI.',
                    'category' => 'design-systems',
                    'thumbnail' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80',
                    'published_at' => now()->subDays(20),
                    'tags' => ['Editorial', 'Animation', 'Content Ops'],
                ],
            ]);

            foreach ($posts as $postData) {
                $post = Post::create([
                    'title' => $postData['title'],
                    'slug' => $postData['slug'],
                    'excerpt' => $postData['excerpt'],
                    'body' => self::articleBody($postData['title'], $postData['excerpt']),
                    'thumbnail' => $postData['thumbnail'],
                    'user_id' => $author->id,
                    'category_id' => $categories->firstWhere('slug', $postData['category'])->id,
                    'published_at' => $postData['published_at'],
                ]);

                $post->tags()->attach($tags->whereIn('name', $postData['tags'])->pluck('id')->all());

                Comment::create([
                    'post_id' => $post->id,
                    'name' => 'Ava Stone',
                    'email' => 'ava@example.com',
                    'body' => 'This piece feels like the rare article that is both inspiring and immediately useful.',
                    'approved_at' => now()->subHours(3),
                ]);
            }

            NewsletterSubscriber::create(['email' => 'reader@example.com']);
            NewsletterSubscriber::create(['email' => 'subscriber@example.com']);
        });
    }

    private static function articleBody(string $title, string $excerpt): string
    {
        return implode("\n\n", [
            '<p>' . e($excerpt) . '</p>',
            '<h2 id="start-with-structure">Start with structure</h2>',
            '<p>' . e($title) . ' works because the layout leads the eye with rhythm, contrast, and a deliberate hierarchy.</p>',
            '<blockquote>Luxury on the web is often just clarity with better pacing.</blockquote>',
            '<h2 id="takeaways">Takeaways</h2>',
            '<p>Typography, imagery, and spacing should support the story instead of distracting from it.</p>',
        ]);
    }
}
