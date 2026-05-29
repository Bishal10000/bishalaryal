<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class MigratePostThumbnailsToCloudinary extends Command
{
    protected $signature = 'images:migrate-to-cloudinary';

    protected $description = 'Move post thumbnails from local storage to Cloudinary.';

    public function handle()
    {
        $service = app(\App\Services\CloudinaryService::class);
        $posts = \App\Models\Post::all();
        $migrated = 0;

        foreach ($posts as $post) {
            if (empty($post->thumbnail)) continue;
            if (str_starts_with($post->thumbnail, 'http')) continue;

            $localPath = storage_path('app/public/' . $post->thumbnail);

            if (!file_exists($localPath)) {
                $this->warn("File not found for post ID {$post->id}: {$localPath}");
                continue;
            }

            try {
                $url = $service->upload($localPath);
                \DB::table('posts')->where('id', $post->id)->update(['thumbnail' => $url]);
                unlink($localPath);
                $migrated++;
                $this->info("Migrated post ID {$post->id}");
            } catch (\Exception $e) {
                $this->error("Failed post ID {$post->id}: " . $e->getMessage());
            }
        }

        $this->info("Done. Migrated {$migrated} images.");
    }
}