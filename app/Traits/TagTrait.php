<?php


namespace App\Traits;


use App\Models\Blog\Post;

trait TagTrait
{
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
