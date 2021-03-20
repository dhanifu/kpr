<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function set(Request $request)
    {
        $besar_pinjaman = $request->besar_pinjam;
        $bunga = $request->bunga;
        $jangka = $request->jangka;

        $bungapersen = $bunga / 100;
        $tahun = $jangka / 12;

        $c = pow((1 + $bungapersen), $tahun);
        $d = $c - 1;
        $fax = ($bungapersen * $c) / $d;
        $anuitas = round($fax, 6);

        $besar_angsur = ($besar_pinjaman * $anuitas) / 12;
        $bulat_angsur = round($besar_angsur);
        // if (substr($a, -2) >= 1) {
        $besar_angsuran = round($bulat_angsur, -2) + 100;
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
        // return response()->json($array_all);
        return view('user.pinjaman.show', [
            'besar_pinjaman' => $request->besar_pinjam,
            'bunga' => $request->bunga,
            'jangka' => $request->jangka,
            'all' => $array_all,
            'besar_angsuran' => $besar_angsuran,
            'no' => intval($jangka)
        ]);
    }
}
