<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\CreatePermissionRequest;
use App\Repository\Backend\Permission\PermissionRepository;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{

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
//        dd($this->permissionRepository->getForDataTable());
        return view('backend.permission.index');
    }

    public function getDataTable()
    {
        return $this->permissionRepository->getForDataTable();
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
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\GeneralException
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
