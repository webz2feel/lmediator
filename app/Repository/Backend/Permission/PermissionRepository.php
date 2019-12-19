<?php


namespace App\Repository\Backend\Permission;


use App\Models\Permission\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionRepository
{
    public function getForDataTable()
    {
        return Datatables::of(Permission::all())
            ->escapeColumns(['name'])
            ->addColumn('permissions', function ($permission) {
                if ($permission) {
                    return '<span class="label label-success">'.trans('labels.general.all').'</span>';
                }
            })
            ->addColumn('actions', function ($permission) {
                return $permission->action_buttons;
            })
            ->make(true);
    }
}
