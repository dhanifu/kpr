<?php

namespace App\Http\Controllers\Admin;

use App\Detailkpr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pinjaman;

class DetaildataController extends Controller
{
    public function getAngsuranKe()
    {
        $pinjams = Detailkpr::orderBy('id', 'ASC')->paginate(20);
        return view('admin.detaildata.angsuranke.index', compact('pinjams'));
    }

    public function getangsuran(Request $request)
    {
        $cari = $request->cari;
        $pinjams = Detailkpr::where('id','LIKE',"%".$cari."%")->get();
        return view('admin.detaildata.angsuranke.index', compact('pinjams'));
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
            $pinjams = Detailkpr::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
            return view('admin.datapinjaman.approve.index', compact('pinjams'));
        }
        if ($approve == 'pending') {
            $pinjams = Detailkpr::where('status', 0)->orderBy('id', 'ASC')->paginate(20);
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
    
    public function cari(Request $request)
    {
        $id = $request->cari;
        $pinjams = Detailkpr::where('nrp', 'like', "%" . $id ."%")->get();
        return view('admin.detaildata.angsuranke.index', compact('pinjams'));
    }
}
