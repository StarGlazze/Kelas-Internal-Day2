<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('post', [
            'dataPost' => $posts
        ]);
    }
    public function create()
    {
        return view('tambah-post');
    }
    public function edit($id)
    {
        //dd($id);
        $post = Post::find($id);
        return view('edit-post' , [
            'postingan' => $post
        ]);
    }
    public function store(Request $request)
    {
        //dd($request->all());
        // orm adalah Object Relational Mapping, yang digunakan untuk menghubungkan model dengan database
        Post::create($request->all());
        return redirect('/posts');
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $post = Post::find($id);
        $post->update($request->all());
        return redirect('/posts');
    }
}
