<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts()
    {
        $allPostes= [
            ['id' => 1, 'title' => 'Post 1', 'Psted_by' => 'Shaheed1','created_at' => '2023-10-01'],
            ['id' => 2, 'title' => 'Post 2', 'Psted_by' => 'Shaheed2','created_at' => '2023-10-02'],
            ['id' => 3, 'title' => 'Post 3', 'Psted_by' => 'Shaheed3','created_at' => '2023-10-03'],
        ];
        return view('Shaheed', ['posts' => $allPostes]);
    }

    public function show($post)
    {
        $singlePost = [ 'id' => 1, 'title' => 'Post 1', 'email' => 'shaheed@gmail.com','Description' => 'Shaheed jbkjblfdhdhfbbl', 'Psted_by' => 'Shaheed1','created_at' => '2023-10-01'];
        return view('Show.index' , ['post' => $singlePost]);
    }

    public function create()
    {
        return view('Create.index');
    }
    public function store()
    {
        $data= request ()->all();
        return $data;
        return to_route('posts.index');
    }
}
