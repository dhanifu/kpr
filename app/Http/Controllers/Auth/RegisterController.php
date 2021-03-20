<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Pangkat;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |array
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var stringarray
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'nrp' => ['required', 'min:2', 'max:100', 'unique:users,nrp'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => "3",
            'pangkat_id' => $data['pangkat_id'],
            'nrp' => $data['nrp'],
            'password' => Hash::make($data['password']),
            'status_verif' => 0,
        ]);
    }

    // cegah login dari registrasi
    protected function registered()
    {
        return redirect()->route('home');
    }
}
