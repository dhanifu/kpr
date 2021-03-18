<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatapinjamanController extends Controller
{
    public function getPending()
    {
        return view('admin.datapinjaman.pending.index');
    }
    public function getApprove()
    {
        return view('admin.datapinjaman.approve.index');
    }
}
