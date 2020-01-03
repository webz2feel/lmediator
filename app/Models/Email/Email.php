<?php

namespace App\Models\Email;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
}
