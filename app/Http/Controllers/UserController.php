<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.index', compact('user'), [
            'title' => 'Daftar Admin',
        ]);
    }

    public function create()
    {
        return view('admin.tambah', [
            'title' => 'Tambah Admin',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
          
        ],
        [
            'username.required' => 'Username harus diisi !',
            'username.unique' => 'Username telah digunakan !',
            'name.required' => 'Nama harus diisi !',
            'password.required' => 'Password harus diisi !'
        ]
        );

        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('user')->with('success', 'Admin berhasil ditambahkan!');
    }
}
