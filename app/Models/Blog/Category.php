<?php

namespace App\Models\Blog;

use App\Traits\CategoryTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CategoryTrait;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
}
