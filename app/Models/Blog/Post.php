<?php

namespace App\Models\Blog;

use App\Traits\PostTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use PostTrait;
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
}
