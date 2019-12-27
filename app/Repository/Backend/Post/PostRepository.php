<?php


namespace App\Repository\Backend\Post;


use App\Models\Blog\Post;
use Yajra\DataTables\Facades\DataTables;
class PostRepository
{
    public function getForDataTable()
    {
        return Datatables::of(Post::latest()->get())
            ->escapeColumns([])
            ->addColumn('preview', function($post) {
                return '<a href="'.asset('storage/images/'.$post->image).'" data-popup="lightbox">
                    <img src="'.asset('storage/images/'.$post->image).'" alt="" class="img-preview rounded">
                </a>';
            })
            ->addColumn('title', function($post) {
                return $post->title;
            })
            ->addColumn('author', function($post) {
                return $post->admin->full_name;
            })
            ->addColumn('categories', function($post) {
                $cat = '';
                foreach($post->categories as $cat){
                    $cat .= ', '. $cat->name;
                }
                return $cat;
//                return $post->categories->name;
            })
            ->addColumn('tags', function($post) {
                return 'test';
//                return $post->tags->name;
            })
            ->addColumn('created_at', function ($post) {
                if ($post->created_at) {
                    return $post->created_at->format('j F Y');
                }
            })
            ->addColumn('actions', function ($user) {
                return 'test';
//                return $user->action_buttons;
            })
            ->make(true);
    }
}
