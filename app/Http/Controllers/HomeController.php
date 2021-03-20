<?php

namespace App\Http\Controllers;

use App\Pangkat;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'user' => User::whereIn('role', ['2', '3'])->count(),
            'pengelola' => User::where('role', 1)->count(),
            'admin' => User::where('role', 0)->count(),
            'pangkats' => Pangkat::count()
        ]);
    }

    public function kalkulator()
    {
        return view('admin.kalkulator.index');
    }
    
}
