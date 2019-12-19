<?php

namespace App\Models\Admin;

use App\Models\Admin\Attributes\AccessAttribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasPermissionsTrait;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasPermissionsTrait;
    use Notifiable;
    use AccessAttribute;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
