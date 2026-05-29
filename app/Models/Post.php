<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable(['title', 'slug', 'body', 'excerpt', 'thumbnail', 'user_id', 'category_id', 'published_at'])]
class Post extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($post) {
            if (!empty($post->thumbnail) && !str_starts_with($post->thumbnail, 'http')) {
                $localPath = storage_path('app/public/' . $post->thumbnail);
                if (file_exists($localPath)) {
                    try {
                        $service = app(\App\Services\CloudinaryService::class);
                        $url = $service->upload($localPath);
                        \DB::table('posts')->where('id', $post->id)->update(['thumbnail' => $url]);
                        unlink($localPath);
                    } catch (\Exception $e) {
                        \Log::error('Cloudinary upload failed: ' . $e->getMessage());
                    }
                }
            }
        });
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderByDesc('published_at')->orderByDesc('id');
    }

    public function readingTimeMinutes(): int
    {
        $words = str_word_count(strip_tags($this->body ?? ''));

        return max(1, (int) ceil($words / 220));
    }

    public function thumbnailUrl(): string
    {
        if (!empty($this->thumbnail) && str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        }

        if (!empty($this->thumbnail)) {
            return asset(ltrim($this->thumbnail, '/'));
        }

        return 'https://placehold.co/800x500/111111/c8622a?text=Bishal+Aryal';
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function teaser(): string
    {
        return Str::limit(strip_tags($this->excerpt ?: $this->body), 150);
    }

    public function absoluteUrl(): string
    {
        return route('posts.show', $this);
    }
}
