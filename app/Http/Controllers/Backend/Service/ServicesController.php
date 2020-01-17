<?php

namespace App\Http\Controllers\Backend\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\CreateServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Models\Service\Service;
use App\Services\ServiceFormFields;
use Illuminate\Http\Request;
use UploadImage;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.service.index');
    }

    public function getDataTable()
    {
        return Datatables::of(Service::latest()->get())
            ->escapeColumns(['name'])
            ->addColumn(
                'image',
                function ($service) {
                    return '<a href="' . asset('storage/images/services/' . $service->image) . '" data-popup="lightbox">
                    <img src="' . asset('storage/images/services/' . $service->image) . '" alt="" class="img-preview rounded" width="50" height="50">
                </a>';
                }
            )
            ->addColumn('active', function ($service) {
                return $service->active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
            })
            ->addColumn('display_on_home', function ($service) {
                return $service->display_on_home ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-secondary">No</span>';
            })
            ->addColumn('created_at', function ($service) {
                if ($service->created_at) {
                    return $service->created_at->format('j F Y h:i');
                }
            })
            ->addColumn('posts_count', function($service){
                return $service->posts_count;
            })
            ->addColumn('actions', function ($service) {
                return $service->action_buttons;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $service = new ServiceFormFields();
        $data = $service->handle();
        return view('backend.service.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Service\CreateServiceRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateServiceRequest $request)
    {
        if($service = $request->serviceFillData()){
            if($request->has('image')){
                $imageName = UploadImage::upload($request->file('image'), 'services/', '', 0, 0, false);
                $service->update([
                  'image' => $imageName,
              ]);
            }
//            event(new ServiceCreatedEvent($service));
            return redirect()->route('admin.service.index')->with('success','Service created successfully.');
        }else {
            return redirect()->route('admin.service.index')->with('error','There is an error saving record');
        }
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
     * @param  \App\Http\Requests\Service\UpdateServiceRequest  $request
     * @param  int  $id
     *
     * @return void
     */
    public function update(UpdateServiceRequest $request, $id)
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
