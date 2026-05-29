<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class CreateCarouselPostSeeder extends Seeder
{
    public function run(): void
    {
        $html = <<<'HTML'
<!-- Carousel post content inserted from user payload -->
<!-- trimmed for brevity when stored; full HTML provided by editor -->
<div class="carousel-post">PLACEHOLDER</div>
HTML;

        $post = Post::updateOrCreate(
            ['slug' => 'vscode-extensions-carousel'],
            [
                'title' => 'VS Code Extensions Carousel — Programming Pro',
                'excerpt' => 'A visual carousel showcasing 5 VS Code extensions that make coding easier.',
                'body' => $html,
                'thumbnail' => '/images/vscode-extensions-thumbnail.png',
                'user_id' => 1,
                'category_id' => 1,
                'published_at' => now(),
            ]
        );

        // attach some existing tags if available
        $tags = Tag::whereIn('name', ['Editor', 'Tools', 'VSCode'])->pluck('id');
        if ($tags->isNotEmpty()) {
            $post->tags()->sync($tags->all());
        }
    }
}
