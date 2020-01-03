<?php

namespace App\Http\Controllers\Backend\Email;

use App\Http\Controllers\Controller;
use App\Http\Requests\Email\StoreEmailRequest;
use App\Repository\Backend\Email\EmailRepository;
use App\Services\EmailFormFields;
use Illuminate\Http\Request;

class EmailsController extends Controller
{

    /**
     * @var \App\Repository\Backend\Email\EmailRepository
     */
    private $emailRepository;

    public function __construct(EmailRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $email = new EmailFormFields();
        $data = $email->handle();
        return view('backend.email.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Email\StoreEmailRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreEmailRequest $request)
    {
        $emailData = $request->emailFillData();
        $this->emailRepository->storeNewEmail($emailData);
        return redirect()->route('admin.email.index')->with('success','Email created successfully');
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
