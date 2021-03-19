<?php

namespace App\Http\Controllers;

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
        // $cek_role = User::where('role', auth()->user()->role == 2);
        return view('home');
    }

    public function kalkulator()
    {
        return view('admin.kalkulator.index');
    }

    public function HitungKalkulator(Request $request)
    {
        $array1 = [];
        $array2 = [];
        $array3 = [];
        $array4 = [];

        $besar_pinjaman = $request->besar_pinjam;
        $bunga = $request->bunga;
        $jangka = $request->jangka;

        $bungapersen = $bunga / 100;
        $tahun = $jangka / 12;

        $c = pow((1 + $bungapersen), $tahun);
        $d = $c - 1;
        $fax = ($bungapersen * $c) / $d;
        $anuitas = round($fax, 6);

        $hutang = $besar_pinjaman;

            $a = ($besar_pinjaman * $anuitas) / 12;
            if (substr($a, -2) >= 1) {
                $besar_angsuran = round($a, -2)+100;
            }

            $angsuran_bunga = $besar_pinjaman * $bungapersen / 12;
            $angsuran_pokok = $besar_angsuran - $angsuran_bunga;

            $hutang = $hutang - $angsuran_pokok;
            $sisa_pinjaman = $besar_pinjaman - $angsuran_pokok;

        array_push($array1, $angsuran_bunga);
        array_push($array2, $angsuran_pokok);
        array_push($array3, $hutang);
        array_push($array4, $sisa_pinjaman);

    }
    
}
