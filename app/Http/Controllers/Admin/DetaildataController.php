<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pinjaman;

class DetaildataController extends Controller
{
    public function getAngsuranKe()
    {
        return view('admin.detaildata.angsuranke.index');
    }
    public function getPokok()
    {
        return view('admin.detaildata.pokok.index');
    }
    public function getBunga()
    {
        return view('admin.detaildata.bunga.index');
    }
    public function getBesarAngsuran()
    {
        return view('admin.detaildata.besarangsuran.index');
    }
    public function getSisaAngsuran()
    {
        return view('admin.detaildata.sisaangsuran.index');
    }
    public function getindex($approve)
    {
        if ($approve == 'approve') {
            $pinjams = Pinjaman::where('status', 1)->get();
            return view('admin.datapinjaman.approve.index', compact('pinjams'));
        }
        if ($approve == 'pending') {
            $pinjams = Pinjaman::where('status', 0)->get();
            return view('admin.datapinjaman.pending.index', compact('pinjams'));
        }
    }
    public function statusupdate($id)
    {
        $pinjam = Pinjaman::findOrFail($id);
        $pinjam->update([
            'status' => 1
        ]);
        return back();
    }
    public function statusdecline($id)
    {
        $pinjam = Pinjaman::findOrFail($id);
        $pinjam->update([
            'status' => 0
        ]);
        return back();
    }
    public function cari($id)
    {
        $id = Pinjaman::where('name', 'like', "%" . $id . "%")->get();
        return view('admin.datapinjaman.approve.index', compact('pinjams'));
    }
}
