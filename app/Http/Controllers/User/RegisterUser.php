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

}
