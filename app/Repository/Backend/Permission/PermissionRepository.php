<?php


namespace App\Repository\Backend\Permission;


use App\Exceptions\GeneralException;
use App\Models\Permission\Permission;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PermissionRepository
{
    public function getForDataTable()
    {
        return Datatables::of(Permission::orderBy('id', 'desc')->get())
            ->escapeColumns(['name'])
            ->addColumn('created_at', function ($permission) {
                if ($permission->created_at) {
                    return $permission->created_at->format('F j Y h:i');
//                    return '<span class="label label-success">'.trans('labels.general.all').'</span>';
                }
            })
            ->addColumn('actions', function ($permission) {
                return $permission->action_buttons;
            })
            ->make(true);
    }

    public function storePermission(array $request)
    {
        $slug = Str::slug($request['slug'], '-');
        $permissionFound = Permission::where('slug', $slug)->get()->count();
        if ($permissionFound) {
            return false;
        }

        $permission = new Permission();
        $permission->name = $request['name'];
        $permission->slug = $slug;
        if($permission->save()){
            return true;
        }
    }
}
