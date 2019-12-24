<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Permission\Permission;
use App\Models\Role\Role;
use App\Repository\Backend\Role\RoleRepository;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * @var \App\Repository\Backend\Role\RoleRepository
     */
    private $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.role.index');
    }

    public function getDataTable()
    {
        return $this->repository->getForDataTable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $role = new Role();
        $permissions = Permission::all();
        return view('backend.role.create')->withRole($role)->withPermissions($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Role\CreateRoleRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRoleRequest $request)
    {
//        dd($request->all());
        if(!$this->repository->storeRole($request->all())){
            return redirect()->route('admin.role.create')->with('error','Slug has already taken');
        }
        return redirect()->route('admin.role.index')->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('backend.role.edit')
            ->withRole($role)
            ->withRolePermissions($role->permissions->pluck('id')->all())
            ->withPermissions($permissions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Role\UpdateRoleRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        if(!$this->repository->updateRole($request->all(), $id)){
            return redirect()->route('admin.role.edit', $id)->with('error','Slug has already taken');
        }
        return redirect()->route('admin.role.index')->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
