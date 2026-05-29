<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateProgrammerWebsitesPostSeeder extends Seeder
{
    /**
     * Seed the "5 Websites Every Programmer Should Bookmark" blog post.
     */
    public function run(): void
    {
        $author = User::first();

        if (! $author) {
            $this->command->error('No user found. Please create a user first.');
            return;
        }

        // Use existing category or create a new one
        $category = Category::firstOrCreate(
            ['slug' => 'resources'],
            ['name' => 'Resources']
        );

        // Create or find relevant tags
        $tagNames = ['WebDev', 'Programming', 'Resources', 'LearnToCode'];
        $tagIds = [];
        foreach ($tagNames as $name) {
            $tag = Tag::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($name)],
                ['name' => $name]
            );
            $tagIds[] = $tag->id;
        }

        // Create the post
        $post = Post::updateOrCreate(
            ['slug' => '5-websites-every-programmer-should-bookmark'],
            [
                'title' => '5 Websites Every Programmer Should Bookmark',
                'body' => 'PLACEHOLDER',
                'excerpt' => 'Stop googling the same tools every day. Add these to your browser and actually use them.',
                'thumbnail' => '/images/programmer-websites-thumbnail.png',
                'user_id' => $author->id,
                'category_id' => $category->id,
                'published_at' => now(),
            ]
        );

        // Attach tags
        $post->tags()->sync($tagIds);

        $this->command->info('✅ "5 Websites Every Programmer Should Bookmark" post created successfully!');
        $this->command->info("   URL: /posts/{$post->slug}");
    }
}
