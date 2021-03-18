<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Pangkat;

class RegisterUser extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'pangkats' => Pangkat::get()
        ]);
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users,username'],
            'password' => ['required', 'min:8', 'confirmed'],
            'pangkat_id' => ['required']
        ]);
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'role' => "2",
            'username' => request('username'),
            'password' => Hash::make(request('password')),
            'status_verif' => 0,
            'pangkat_id' => request('pangkat_id')
        ]);
        return redirect()->route('login')->with('success', 'untuk melanjutkan silahkan verifikasi email anda.');
    }
}
