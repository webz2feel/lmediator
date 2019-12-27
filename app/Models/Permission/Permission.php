<?php

namespace App\Models\Permission;

use App\Models\ModelTrait;
use App\Models\Permission\Attributes\PermissionAttribute;
use App\Models\Role\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use ModelTrait;
    use PermissionAttribute;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }
}
