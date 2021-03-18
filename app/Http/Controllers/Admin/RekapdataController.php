<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RekapdataController extends Controller
{
    //
    public function getBulan()
    {
        return view('admin.rekapdata.bulan.index');
    }
    public function getTahun()
    {
        return view('admin.rekapdata.tahun.index');
    }
}
