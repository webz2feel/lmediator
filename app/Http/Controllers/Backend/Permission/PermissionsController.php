<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\CreatePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Models\Permission\Permission;
use App\Repository\Backend\Permission\PermissionRepository;
use App\Traits\RolesAndPermissionsHelpersTrait;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

    use RolesAndPermissionsHelpersTrait;
    /**
     * @var \App\Repository\Backend\Permission\PermissionRepository
     */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.permission.index');
    }

    public function getDataTable()
    {
        $data = $this->getDashboardData();
        $items = $data['data']['sortedPermissionsRolesUsers'];
        return $this->permissionRepository->getForDataTable($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Permission\CreatePermissionRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePermissionRequest $request)
    {
        if(!$this->permissionRepository->storePermission($request->all())){
            return redirect()->route('admin.permission.create')->with('error','Slug has already taken');
        }
        return redirect()->route('admin.permission.index')->with('success','Permission created successfully');
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
        $permission = Permission::findOrFail($id);
        return view('backend.permission.edit')->withPermission($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Permission\UpdatePermissionRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        if(!$this->permissionRepository->updatePermission($request->all(), $id)){
            return redirect()->route('admin.permission.edit', $id)->with('error','Slug has already taken');
        }
        return redirect()->route('admin.permission.index')->with('success','Permission updated successfully');
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
        Permission::destroy($id);
        return redirect()->back()->with('success', 'Permission deleted successfully');
    }
}
