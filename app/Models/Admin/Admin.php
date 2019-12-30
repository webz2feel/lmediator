<?php

namespace App\Models\Admin;

use App\Contracts\HasRoleAndPermissionContract;
use App\Models\Admin\Attributes\AccessAttribute;
use App\Models\ModelTrait;
use App\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\HasPermissionsTrait;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
//    use HasPermissionsTrait;
    use Notifiable;
    use ModelTrait;
    use AccessAttribute;
    use HasRoleAndPermission;
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
