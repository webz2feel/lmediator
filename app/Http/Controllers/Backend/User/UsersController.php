<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Admin\Admin;
use App\Models\Permission\Permission;
use App\Models\Role\Role;
use App\Repository\Backend\User\UserRepository;
use App\Services\UserFormFields;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * @var \App\Repository\Backend\User\UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.user.index');
    }

    public function getDataTable()
    {
        return $this->userRepository->getForDataTable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $service = new UserFormFields();
        $data = $service->handle();
        return view('backend.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\CreateUserRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->userFillData();
        if(!$this->userRepository->createUser($request, $data)){
            return redirect()->route('admin.user.create')->with('error','There is an error creating user');
        }
        return redirect()->route('admin.user.index')->with('success','User created successfully');
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
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $service = new UserFormFields($id);
        $data = $service->handle();
        return view('backend.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateUserRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->userFillData($id);
        if(!$this->userRepository->updateUser($request, $id, $data)){
            return redirect()->route('admin.user.edit', $id)->with('error','There is an error updating user');
        }
        return redirect()->route('admin.user.index')->with('success','User updated successfully');
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
        Admin::destroy($id);
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
