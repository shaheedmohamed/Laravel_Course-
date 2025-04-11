<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts()
    {
        $postForm= Post::all();
        return view('Shaheed', ['posts' => $postForm]);
    }

    public function show($post)
    {
        $singlePost = Post::findOrFail($post);
        return view('Show.index' , ['post' => $singlePost]);
    }

    public function create()
    {
        $users= User::all();
        return view('Create.index', ['users' => $users]);
    }
    public function store()
    {
        $post= request()->all();
        $user_id = request()->user_id;
        $title = request()->title;
        $description = request()->description;
        $posted_by = request()->posted_by;

        $post = new Post();
        $post->id = $user_id;
        $post->title = $title;
        $post->description = $description;
        $post->posted_by = $posted_by;
        $post->save();
        
        return to_route('posts.index');

    }
}
