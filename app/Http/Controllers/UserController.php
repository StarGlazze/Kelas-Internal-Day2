<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('user', [
            'dataUser' => $users
        ]);
    }
    public function create()
    {
        return view('tambah-user');
    }
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/users');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('edit-user', [
            'user' => $user
        ]);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->filled('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        } else {
            $request->request->remove('password');
        }

        $user->update($request->all());
        return redirect('/users');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }
}
