<?php


namespace App\Repository\Backend\Email;


use App\Exceptions\GeneralException;
use App\Models\Email\Email;
use App\Models\Permission\Permission;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class EmailRepository
{
    public function getForDataTable($sortedPermissionsRolesUsers)
    {
        return Datatables::of($sortedPermissionsRolesUsers)
            ->escapeColumns([])
            ->addColumn('name', function ($permission) {
                if ($permission['permission']->name) {
                    return $permission['permission']->name;
                }
            })
            ->addColumn('slug', function ($permission) {
                if ($permission['permission']->slug) {
                    return $permission['permission']->slug;
                }
            })
            ->addColumn('description', function ($permission) {
                if ($permission['permission']->description) {
                    return $permission['permission']->description;
                }
            })
            ->addColumn('roles', function ($permission) {
                $roles = '';
                if ($permission['roles']->count() > 0) {
                    foreach($permission['roles'] as $role ){
                        $roles .= '<span class="badge bg-success">'.$role->name.'</span>';
                    }
                }else {
                    $roles = 'None';
                }
                return rtrim($roles, ',');
            })
            ->addColumn('created_at', function ($permission) {
                if ($permission['permission']->created_at) {
                    return $permission['permission']->created_at->format('j F Y h:i');
                }
            })
            ->addColumn('updated_at', function ($permission) {
                if ($permission['permission']->updated_at) {
                    return $permission['permission']->updated_at->format('j F Y h:i');
                }
            })
            ->addColumn('actions', function ($permission) {
                return $permission['permission']->action_buttons;
            })
            ->make(true);
    }

    public function storeNewEmail(array $emailData)
    {
        if(Email::create($emailData)){
            return true;
        }
        return false;
    }

    public function updatePermission($request, $id)
    {
        $slug = Str::slug($request['slug'], '-');
        $permissionFound = Permission::where('slug', $slug)->where('id','!=', $id)->get()->count();
        if ($permissionFound) {
            return false;
        }

        $permission = Permission::findOrFail($request['id']);
        $permission->name = $request['name'];
        $permission->slug = $slug;
        if($permission->save()){
            return true;
        }
    }
}
