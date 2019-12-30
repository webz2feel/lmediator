<?php


namespace App\Traits;


use App\Models\Admin\Admin;
use App\Models\Role\Role;

trait PermissionHasRelations
{
    /**
     * Permission belongs to many roles.
     *
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * Permission belongs to many users.
     *
     * @return BelongsToMany
     */
    public function admins()
    {
        return $this->belongsToMany(Admin::class)->withTimestamps();
    }
}
