<?php

namespace App\Models\Role;

use App\Models\ModelTrait;
use App\Models\Permission\Permission;
use App\Models\Role\Attributes\RoleAttribute;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use ModelTrait;
    use RoleAttribute;

    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
    public function permissions() {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }
}
