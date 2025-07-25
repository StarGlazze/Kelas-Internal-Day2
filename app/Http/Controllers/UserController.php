<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('user.index', [
            'dataUser' => $users
        ]);
    }

    public function create()
    {
        return view('user.tambah-user');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'string', 'min:6'],
            ],
            [
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah digunakan',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 6 karakter',
            ]
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('show-user', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('user.edit-user', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                'password' => ['nullable', 'string', 'min:6'],
            ],
            [
                'name.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah digunakan',
                'password.min' => 'Password minimal 6 karakter',
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
