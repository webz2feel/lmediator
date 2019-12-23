<?php


namespace App\Repository\Backend\Role;


use App\Models\Role\Role;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
class RoleRepository
{
    public function getForDataTable()
    {
        return Datatables::of(Role::orderBy('created_at', 'desc')->get())
            ->escapeColumns(['name'])
            ->addColumn('created_at', function ($role) {
                if ($role->created_at) {
                    return $role->created_at->format('j F Y h:i');
//                    return '<span class="label label-success">'.trans('labels.general.all').'</span>';
                }
            })
            ->addColumn('actions', function ($role) {
                return $role->action_buttons;
            })
            ->make(true);
    }

    public function storeRole(array $request)
    {
        $slug = Str::slug($request['slug'], '-');
        $permissionFound = Role::where('slug', $slug)->get()->count();
        if ($permissionFound) {
            return false;
        }

        $permission = new Role();
        $permission->name = $request['name'];
        $permission->slug = $slug;
        if($permission->save()){
            return true;
        }
    }

    public function updateRole($request, $id)
    {
        $slug = Str::slug($request['slug'], '-');
        $permissionFound = Role::where('slug', $slug)->where('id','!=', $id)->get()->count();
        if ($permissionFound) {
            return false;
        }

        $permission = Role::findOrFail($request['id']);
        $permission->name = $request['name'];
        $permission->slug = $slug;
        if($permission->save()){
            return true;
        }
    }
}
