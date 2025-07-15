<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post');
    }
    public function create()
    {
        return view('tambah-post');
    }
    public function edit()
    {
        return view('edit-post');
    }
}
