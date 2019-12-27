<?php


namespace App\Traits;


use App\Models\Blog\Post;

trait CategoryTrait
{
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    public function scopeActive($query, $arg)
    {
        return $query->where('status', $arg);
    }

    public function scopeCountPosts($query, $arg)
    {
        return $query->withCount($arg);
    }
}
