<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

#[Fillable(['title', 'slug', 'body', 'excerpt', 'thumbnail', 'user_id', 'category_id', 'published_at'])]
class Post extends Model
{
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
        $thumbnail = $this->thumbnail;

        if (!$thumbnail) {
            return 'https://images.unsplash.com/photo-1470214304380-aadaedcfff80?auto=format&fit=crop&w=1200&q=80';
        }

        if (str_starts_with($thumbnail, 'http://') || str_starts_with($thumbnail, 'https://')) {
            return $thumbnail;
        }

        return Storage::disk('public')->url($thumbnail);
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
