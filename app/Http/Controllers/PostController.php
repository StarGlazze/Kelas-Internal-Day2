<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('post.index', [
            'dataPost' => $posts
        ]);
    }

    public function create()
    {
        return view('post.tambah-post');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'judul' => ['required', 'string', 'max:255'],
                'isi' => ['required', 'string'],
                'foto' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'judul.string' => 'Judul harus berupa teks',
                'judul.max' => 'Judul maksimal 255 karakter',
                'isi.required' => 'Isi postingan wajib diisi',
                'isi.string' => 'Isi postingan harus berupa teks',
                'foto.required' => 'Foto wajib diunggah',
                'foto.image' => 'File yang diunggah harus berupa gambar',
                'foto.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg',
            ]
        );
        
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('postingan', 'public');
        //dd($data);
        Post::create($data);
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $post->load('komentars');
        return view('post.detail-postingan', [
            'postingan' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('post.edit-post', [
            'postingan' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'judul' => ['required', 'string', 'max:255'],
                'isi' => ['required', 'string'],
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'judul.string' => 'Judul harus berupa teks',
                'judul.max' => 'Judul maksimal 255 karakter',
                'isi.required' => 'Isi postingan wajib diisi',
                'isi.string' => 'Isi postingan harus berupa teks',
            ]
        );

        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->komentars()->delete();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
