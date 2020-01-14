<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Events\Backend\Category\CategoryCreatedEvent;
use App\Events\Backend\Category\CategoryDeletedEvent;
use App\Events\Backend\Category\CategoryUpdatedEvent;
use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        return view('backend.blog.category.index');
    }

    public function getDataTable()
    {
        if(request()->ajax()) {
            return Datatables::of(Category::countPosts('posts')->latest()->get())
                ->escapeColumns(['name', 'slug', 'descriptions'])
                ->addColumn('status', function ($category) {
                    return $category->status ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                })
                ->addColumn('created_at', function ($category) {
                    if ($category->created_at) {
                        return $category->created_at->format('j F Y h:i');
                    }
                })
                ->addColumn('posts_count', function($category){
                    return $category->posts_count;
                })
                ->addColumn('actions', function ($category) {
                    return '<div class="list-icons">
                        <a href="#" class="list-icons-item edit" id="'.$category->id.'">
                        <i class="icon-pencil7"></i></a>
                        <a href="#" id="'.$category->id.'" class="delete list-icons-item"><i class="icon-trash"></i></a>
                    </div>';
                })
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required|min:2|max:100',
            'slug'    =>  'required|unique:categories,slug',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->descriptions = $request->description;
        $category->status = false;
        if($request->has('status')){
            $category->status = true;
        }
        if($category = $category->save()){
            event(new CategoryCreatedEvent($category));
            return response()->json(['success' => 'Category created successfully.']);
        }else {
            return response()->json(['errors' => 'There is an error saving record']);
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
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Category::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $category = Category::findOrFail($request->hidden_id);
        $rules = array(
            'name'    =>  'required|min:2|max:100',
            'slug'    =>  $category->slug != $request->slug ? 'required|unique:categories,slug' : 'required',
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name'          =>  $request->name,
            'slug'          =>  Str::slug($request->slug),
            'descriptions'  =>  $request->description,
        );
        $form_data['status'] = false;
        if($request->has('status')){
            $form_data['status'] = true;
        }
        Category::whereId($request->hidden_id)->update($form_data);
        event(new CategoryUpdatedEvent($category));
        return response()->json(['success' => 'Category is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        event(new CategoryDeletedEvent($category));
    }
}
