<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Blog\Tag;
use App\Repository\Backend\Post\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.blog.post.index');
    }

    public function getDataTable(PostRepository $postRepository)
    {
        return $postRepository->getForDataTable();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::latest()->active(1)->get();
        $tags = Tag::latest()->active(1)->get();
        return view('backend.blog.post.create')
            ->withPost($post)
            ->withCategories($categories)
            ->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Post\CreatePostRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post();
        $post->admin_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->status = $request->status;
        $post->excerpt = $request->excerpt;
        if($request->has('allow_comments')){
            $post->allow_comments = 1;
        }
        if($post->save()){
            if($request->categories != '') {
                $post->categories()->sync($request['categories']);
            }
            if($request->tags != '') {
                $post->tags()->sync($request['tags']);
            }
            $this->storeImage($post);
        }
//        event(new NewCustomerHasRegisteredEvent($customer));
        return redirect()->route('admin.post.index')->with('success', 'Post created successfully');
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

    private function storeImage($post)
    {
        if (request()->has('image')) {
            //get filename with extension
            $filenamewithextension = request()->file('image')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $extension = request()->file('image')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            //small thumbnail name
//            $smallthumbnail = $filename.'_small_'.time().'.'.$extension;
            //medium thumbnail name
            /*$mediumthumbnail = $filename.'_medium_'.time().'.'.$extension;
            //large thumbnail name
            $largethumbnail = $filename.'_large_'.time().'.'.$extension;*/
            //Upload File
            request()->file('image')->storeAs('public/images', $filenametostore);
            request()->file('image')->storeAs('public/images/thumbnail', $filenametostore);
            /*request()->file('image')->storeAs('public/images/thumbnail', $mediumthumbnail);
            request()->file('image')->storeAs('public/images/thumbnail', $largethumbnail);*/
            //create small thumbnail
            $actualImage = public_path('storage/images/'.$filenametostore);
            $smallthumbnailpath = public_path('storage/images/thumbnail/'.$filenametostore);
            $this->createThumbnail($smallthumbnailpath, 150, 93);
            //create medium thumbnail
            /*$mediumthumbnailpath = public_path('storage/images/thumbnail/'.$mediumthumbnail);
            $this->createThumbnail($mediumthumbnailpath, 300, 185);
            //create large thumbnail
            $largethumbnailpath = public_path('storage/images/thumbnail/'.$largethumbnail);
            $this->createThumbnail($largethumbnailpath, 550, 340);*/

            $post->update([
                  'image' => $filenametostore,
              ]);
        }
    }

    private function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
}
