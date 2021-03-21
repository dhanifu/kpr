<?php

namespace App\Http\Controllers\Admin;

use App\Detailkpr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pinjaman;
use PDF;

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
        $pinjams = Detailkpr::where('id', 'LIKE', "%" . $cari . "%")->get();
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
        $pinjams = Detailkpr::where('nrp', 'like', "%" . $id . "%")->get();
        return view('admin.detaildata.angsuranke.index', compact('pinjams'));
    }

    public function show($id)
    {

        $kpr = Detailkpr::find($id);


        $besar_pinjaman = $kpr->pinjaman;
        $bunga = 6;
        $jangka = $kpr->jk_waktu;

        $bungapersen = $bunga / 100;
        $tahun = $jangka / 12;

        $c = pow((1 + $bungapersen), $tahun);
        $d = $c - 1;
        $fax = ($bungapersen * $c) / $d;
        $anuitas = round($fax, 6);

        $besar_angsur = ($besar_pinjaman * $anuitas) / 12;
        $besar_angsuran = round($besar_angsur, -2) + 100;
        // if (substr($a, -2) >= 1) {
        // }
        // dd($besar_angsuran);
        //angsuran bunga = pinjaman pokok * bungapersen/ 12-24-36-48-60-72-84-96
        // $besar_angsuran = besarAngsuran($besar_pinjaman,$getAnuitas);
        $array1 = [0 => null];
        $array2 = [0 => null];
        $array3 = [0 => intval($besar_pinjaman)];
        $no = 1;
        $angsuran_bunga = $besar_pinjaman * $bungapersen / 12;
        $angsuran_pokok = $besar_angsuran - $angsuran_bunga;
        for ($i = 1; $i < $jangka; $i++) {

            if ($no == 13) {
                $ang_bunga = $besar_pinjaman * $bungapersen / 12;
                $angsuran_bunga = round($ang_bunga, 2);
                $angsuran_pokok = $besar_angsuran - $angsuran_bunga;
                $no = 1;
            }
            $no++;
            array_push($array1, $angsuran_bunga);
            array_push($array2, $angsuran_pokok);


            $besar_pinjaman -= $array2[$i];
            array_push($array3, $besar_pinjaman);
        }
        // echo 'besar_angsuran '.$besar_angsuran;
        $array_all = [
            'bunga' => $array1,
            'pokok' => $array2,
            'pinjaman' => $array3,
        ];
        return view('admin.datapinjaman.approve.show',[
            'kpr' => $kpr,
            'all' => $array_all
        ]);

    }
    public function approve_pdf($id)
    {

        $kpr = Detailkpr::find($id);
        $besar_pinjaman = $kpr->pinjaman;
        $bunga = 6;
        $jangka = $kpr->jk_waktu;

        $bungapersen = $bunga / 100;
        $tahun = $jangka / 12;

        $c = pow((1 + $bungapersen), $tahun);
        $d = $c - 1;
        $fax = ($bungapersen * $c) / $d;
        $anuitas = round($fax, 6);

        $besar_angsur = ($besar_pinjaman * $anuitas) / 12;
        $besar_angsuran = round($besar_angsur, -2) + 100;
        // if (substr($a, -2) >= 1) {
        // }
        // dd($besar_angsuran);
        //angsuran bunga = pinjaman pokok * bungapersen/ 12-24-36-48-60-72-84-96
        // $besar_angsuran = besarAngsuran($besar_pinjaman,$getAnuitas);
        $array1 = [0 => null];
        $array2 = [0 => null];
        $array3 = [0 => intval($besar_pinjaman)];
        $no = 1;
        $angsuran_bunga = $besar_pinjaman * $bungapersen / 12;
        $angsuran_pokok = $besar_angsuran - $angsuran_bunga;
        for ($i = 1; $i < $jangka; $i++) {

            if ($no == 13) {
                $ang_bunga = $besar_pinjaman * $bungapersen / 12;
                $angsuran_bunga = round($ang_bunga, 2);
                $angsuran_pokok = $besar_angsuran - $angsuran_bunga;
                $no = 1;
            }
            $no++;
            array_push($array1, $angsuran_bunga);
            array_push($array2, $angsuran_pokok);


            $besar_pinjaman -= $array2[$i];
            array_push($array3, $besar_pinjaman);
        }
        // echo 'besar_angsuran '.$besar_angsuran;
        $array_all = [
            'bunga' => $array1,
            'pokok' => $array2,
            'pinjaman' => $array3,
        ];
        $pdf = PDF::loadview('admin.datapinjaman.pdf', [
            'kpr' => $kpr,
            'all' => $array_all
        ]);
        return $pdf->stream();
    }
}
