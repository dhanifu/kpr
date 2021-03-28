<?php

namespace App\Http\Controllers\Admin;

use App\Detailkpr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pinjaman;
use PDF;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\DB;

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

    public function datatablesGetIndex($approve)
    {
        $data = [];
        $pinjams = DB::table('kpr');
        if ($approve == 'approve') {
            $pinjams = $pinjams->where('status', 1)->orderBy('id', 'ASC');
            $data = DataTables::queryBuilder($pinjams)
                ->editColumn('nrp', function ($pinjam) {
                    return '<span class="badge badge-light">' . $pinjam->nrp . '</span>';
                })->editColumn('nama', function ($pinjam) {
                    return '<a href="' . route('admin.detaildata.show', $pinjam->id) . '" class="text-primary">' . $pinjam->nama . '</a>';
                })->editColumn('pinjaman', function ($pinjam) {
                    return "IDR. " . number_format($pinjam->pinjaman, 0, ',', '.');
                })->editColumn('jml_angs', function ($pinjam) {
                    return "Rp. " . number_format($pinjam->jml_angs, 0, ',', '.');
                })->editColumn('jml_tunggakan', function ($pinjam) {
                    return "Rp. " . number_format($pinjam->jml_tunggakan, 0, ',', '.');
                })->rawColumns(['nrp', 'nama', 'pinjaman', 'jml_angs', 'jml_tunggakan'])
                ->toJson();
        } else if ($approve == 'pending') {
            $pinjams = $pinjams->where('status', 0)->orderBy('id', 'ASC');
            $data = DataTables::queryBuilder($pinjams)
                ->editColumn('nrp', function ($pinjam) {
                    return '<span class="badge badge-light">' . $pinjam->nrp . '</span>';
                })->editColumn('pinjaman', function ($pinjam) {
                    return "IDR. " . number_format($pinjam->pinjaman, 0, ',', '.');
                })->editColumn('jml_angs', function ($pinjam) {
                    return "Rp. " . number_format($pinjam->jml_angs, 0, ',', '.');
                })->rawColumns(['nrp', 'nama', 'pinjaman', 'jml_angs', 'jml_tunggakan'])
                ->toJson();
        }

        return $data;
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
        $array4 = [0 => 0];
        $no = 1;
        $angsuran_bunga = $besar_pinjaman * $bungapersen / 12;
        $angsuran_pokok = $besar_angsuran - $angsuran_bunga;
        for ($i = 1; $i <= $kpr->angsuran_masuk; $i++) {

            if ($no == 13) {
                $ang_bunga = $besar_pinjaman * $bungapersen / 12;
                $angsuran_bunga = round($ang_bunga);
                $angsuran_pokoks = $besar_angsuran - $angsuran_bunga;
                $angsuran_pokok = round($angsuran_pokoks);
                $no = 1;
            }
            $no++;
            array_push($array1, $angsuran_bunga);
            array_push($array2, $angsuran_pokok);
            array_push($array4, $besar_angsuran);

            $besar_pinjaman -= $array2[$i];
            array_push($array3, $besar_pinjaman);
        }
        $total_bunga = array_sum($array1);
        $total_pokok = array_sum($array2);
        
        // BIKIN FUNGSI UPDATE DISINI
        Detailkpr::where('id',$id)->update([
            'pokok' => $total_pokok,
            'bunga' => $total_bunga
        ]);
        // echo 'besar_angsuran '.$besar_angsuran;
        $array_all = [
            'bunga' => $array1,
            'pokok' => $array2,
            'pinjaman' => $array3,
            'besar_angsuran' => $array4
        ];
        return view('admin.datapinjaman.approve.show',[
            'jangka' => $jangka,
            'besar_angsuran' => $besar_angsuran,
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
        $array4 = [0 => 0];
        $no = 1;
        $angsuran_bunga = $besar_pinjaman * $bungapersen / 12;
        $angsuran_pokok = $besar_angsuran - $angsuran_bunga;
        for ($i = 1; $i <= $kpr->angsuran_masuk; $i++) {

            if ($no == 13) {
                $ang_bunga = $besar_pinjaman * $bungapersen / 12;
                $angsuran_bunga = round($ang_bunga, 2);
                $angsuran_pokok = $besar_angsuran - $angsuran_bunga;
                $no = 1;
            }
            $no++;
            array_push($array1, $angsuran_bunga);
            array_push($array2, $angsuran_pokok);
            array_push($array4, $besar_angsuran);

            $besar_pinjaman -= $array2[$i];
            array_push($array3, $besar_pinjaman);
        }
        
        // echo 'besar_angsuran '.$besar_angsuran;
        $array_all = [
            'bunga' => $array1,
            'pokok' => $array2,
            'pinjaman' => $array3,
            'besar_angsuran' => $array4
        ];
        $pdf = PDF::loadview('admin.datapinjaman.pdf', [
            'kpr' => $kpr,
            'besar_angsuran' => $besar_angsuran,
            'all' => $array_all,
            'tanggal' => Carbon::now()
        ]);
        return $pdf->stream();
    }
    
    public function search_data_kpr()
    {
        $query = request('query');
        $pinjam = Detailkpr::where('status', 1)->where("nama", "like", "%$query%")
            ->orWhere("nrp", "like", "%$query%")
            ->latest()->paginate(20);
        return view('admin.datapinjaman.approve.index', [
            'pinjams' => $pinjam
        ]);
    }

    public function search_data_manual()
    {
        $query = request('query');
        $pinjam = Detailkpr::where('status', 0)->where("nama", "like", "%$query%")
            ->orWhere("nrp", "like", "%$query%")
            ->latest()->paginate(20);
        return view('admin.datapinjaman.pending.index', [
            'pinjams' => $pinjam
        ]);
    }
}
