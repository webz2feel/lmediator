<?php


namespace App\Repository\Backend\User;


use App\Models\Admin\Admin;
use App\Models\Role\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
class UserRepository
{
    public function getForDataTable()
    {
        return Datatables::of(Admin::orderBy('created_at', 'desc')->get())
            ->escapeColumns(['first_name','last_name', 'email'])
            ->addColumn('status', function($user) {
                return $user->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
            })
            ->addColumn('roles', function($user) {
                $roles = '';
                foreach($user->roles as $role){
                    $roles .= ' <span class="badge badge-success">'.$role->name.'</span>';
                }
                return $roles;
            })
            ->addColumn('created_at', function ($user) {
                if ($user->created_at) {
                    return $user->created_at->format('j F Y h:i');
//                    return '<span class="label label-success">'.trans('labels.general.all').'</span>';
                }
            })
            ->addColumn('actions', function ($user) {
                return $user->action_buttons;
            })
            ->make(true);
    }

    public function createUser($request)
    {
        $user = new Admin();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->is_active = $request['is_active'];
        $user->created_by = Auth::user()->id;

        if($user->save()){
            $user->roles()->sync($request['roles']);
            $user->permissions()->sync($request['permissions']);
            return true;
        }
    }
}
