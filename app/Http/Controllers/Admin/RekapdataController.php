<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Pangkat;
use App\Detailkpr;
use App\Chart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class RekapdataController extends Controller
{
    public function getBulan()
    {
        $month = Carbon::now()->format('m');
        $tahunini = DB::table('kpr')->whereMonth('tmt_angsuran', $month)->get();
        $jumlahpinjaman = $tahunini->sum('pinjaman');
        $totaltunggakan = $tahunini->sum('jml_tunggakan');

        $groups = User::select('status_verif', DB::raw('count(*) as total'))
            ->groupBy('status_verif')
            ->pluck('total', 'status_verif')->all();

        for ($i = 0; $i <= count($groups); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        $chart = new Chart;
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;

        return view('admin.rekapdata.bulan.index',compact('chart'),
        [
            'jumlahpinjaman' => $jumlahpinjaman,
            'totaltunggakan' => $totaltunggakan,
            'user' => Detailkpr::count(),
            'pengelola' => User::where('role', 1)->count(),
            'admin' => User::where('role', 0)->count(),
            'pangkats' => Pangkat::count()
        ]);
    }
    public function getTahun()
    {
        $year = Carbon::now()->format('Y');
        $tahunini =     DB::table('kpr')->whereYear('tmt_angsuran', $year);
        $sembilan = DB::table('kpr')->whereYear('tmt_angsuran', 2009);
        $sepuluh = DB::table('kpr')->whereYear('tmt_angsuran', 2010);
        $sebelas = DB::table('kpr')->whereYear('tmt_angsuran', 2011);
        $duabelas = DB::table('kpr')->whereYear('tmt_angsuran', 2012);
        $tigabelas = DB::table('kpr')->whereYear('tmt_angsuran', 2013);
        $empatbelas = DB::table('kpr')->whereYear('tmt_angsuran', 2014);
        $limabelas = DB::table('kpr')->whereYear('tmt_angsuran', 2015);
        $enambelas = DB::table('kpr')->whereYear('tmt_angsuran', 2016);
        $tujuhbelas = DB::table('kpr')->whereYear('tmt_angsuran', 2017);
        $delapanbelas = DB::table('kpr')->whereYear('tmt_angsuran', 2018);
        $sembilanbelas = DB::table('kpr')->whereYear('tmt_angsuran', 2019);
        $duapuluh = DB::table('kpr')->whereYear('tmt_angsuran', 2020);
        $duasatu = DB::table('kpr')->whereYear('tmt_angsuran', 2021);

        $totaltunggakan = $tahunini->sum('jml_tunggakan');
        $data = Detailkpr::all();
        $jumlahpinjaman = $tahunini->sum('pinjaman');
        // $totaltunggakantahun = $tahunini->sum('jml_tunggakan');
        $total_pokok_tahun = $tahunini->sum('pokok');
        $total_bunga_tahun = $tahunini->sum('bunga');

        $total_pokok_sembilan = $sembilan->sum('pokok');
        $total_bunga_sembilan = $sembilan->sum('bunga');

        $total_pokok_sepuluh = $sepuluh->sum('pokok');
        $total_bunga_sepuluh = $sepuluh->sum('bunga');
        
        $total_pokok_sebelas = $sebelas->sum('pokok');
        $total_bunga_sebelas = $sebelas->sum('bunga');
        
        $total_pokok_duabelas = $duabelas->sum('pokok');
        $total_bunga_duabelas = $duabelas->sum('bunga');
        
        $total_pokok_tigabelas = $tigabelas->sum('pokok');
        $total_bunga_tigabelas = $tigabelas->sum('bunga');
        
        $total_pokok_empatbelas = $empatbelas->sum('pokok');
        $total_bunga_empatbelas = $empatbelas->sum('bunga');
        
        $total_pokok_limabelas = $limabelas->sum('pokok');
        $total_bunga_limabelas = $limabelas->sum('bunga');
        
        $total_pokok_enambelas = $enambelas->sum('pokok');
        $total_bunga_enambelas = $enambelas->sum('bunga');
        
        $total_pokok_tujuhbelas = $tujuhbelas->sum('pokok');
        $total_bunga_tujuhbelas = $tujuhbelas->sum('bunga');
        
        $total_pokok_delapanbelas = $delapanbelas->sum('pokok');
        $total_bunga_delapanbelas = $delapanbelas->sum('bunga');
        
        $total_pokok_sembilanbelas = $sembilanbelas->sum('pokok');
        $total_bunga_sembilanbelas = $sembilanbelas->sum('bunga');

        
        $total_pokok_duapuluh = $duapuluh->sum('pokok');
        $total_bunga_duapuluh = $duapuluh->sum('bunga');

        
        $total_pokok_duasatu = $duasatu->sum('pokok');
        $total_bunga_duasatu = $duasatu->sum('bunga');
        
        
        // $count = Detailkpr::count();
        $count = DB::table('kpr')->whereYear('tmt_angsuran', $year)->count();
        $kpr = Detailkpr::all();
        $besar_pinjaman = [];
        $jangka = [];
        $angs_ke = [];
        //arrayin
        foreach ($kpr as $key) {
            array_push($besar_pinjaman, $key->pinjaman);
            array_push($jangka, $key->jk_waktu);
            array_push($angs_ke, $key->angs_ke);
        }
        $bunga = 6;


        $bungapersen = $bunga / 100;
        $tahun = $jangka[1] / 12;

        $c = pow((1 + $bungapersen), $tahun);
        $d = $c - 1;
        $fax = ($bungapersen * $c) / $d;
        $anuitas = round($fax, 6);
        $array_orang1 = [];
        $array_orang2 = [];
        $array_orang3 = [];
        for ($index = 0; $index < $count; $index++) {
            $besar_angsur = ($besar_pinjaman[$index] * $anuitas) / 12;

            $besar_angsuran = round($besar_angsur, -2) + 100;

            $array1 = [0 => null];
            $array2 = [0 => null];
            $array3 = [0 => intval($besar_pinjaman[$index])];
            $no = 1;

            $angsuran_bunga = $besar_pinjaman[$index] * $bungapersen / 12;
            $angsuran_pokok = $besar_angsuran - $angsuran_bunga;

            for ($i = 1; $i < $jangka[$index] + 1; $i++) {

                if ($no == 13) {
                    $ang_bunga = $besar_pinjaman[$index] * $bungapersen / 12;
                    $angsuran_bunga = round($ang_bunga, 2);
                    $angsuran_pokok = $besar_angsuran - $angsuran_bunga;
                    $no = 1;
                }
                $no++;
                array_push($array1, $angsuran_bunga);
                array_push($array2, $angsuran_pokok);


                $besar_pinjaman[$index] -= $array2[$i];
                array_push($array3, $besar_pinjaman[$index]);
            }
            $total_orang1 = array_sum($array1);
            $total_orang2 = array_sum($array2);

            array_push($array_orang1, $total_orang1);
            array_push($array_orang2, $total_orang2);
            array_push($array_orang3, $array3);
        }
        
        $total_pokok_otomatis = array_sum($array_orang1);
        $total_bunga_otomatis = array_sum($array_orang2);
        
        // dd($total_bunga);

        // echo 'besar_angsuran '.$besar_angsuran;
        $array_all = [
            'bunga' => $array1,
            'pokok' => $array2,
            'pinjaman' => $array3,
        ];
        // echo $total_pokok;
        
        $total_pokok = Detailkpr::sum('pokok');
        $total_bunga = Detailkpr::sum('bunga');

        $groups = User::select('status_verif', DB::raw('count(*) as total'))
            ->groupBy('status_verif')
            ->pluck('total', 'status_verif')->all();

        for ($i = 0; $i <= count($groups); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        $chart = new Chart;
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;

        return view(
            'admin.rekapdata.tahun.index',
            compact('chart'),
            [
                'jumlahpinjaman' => $jumlahpinjaman,
                'totaltunggakan' => $totaltunggakan,
                'total_pokok_sembilan' => $total_pokok_sembilan,
                'total_bunga_sembilan' => $total_bunga_sembilan,
                'total_pokok_sepuluh' => $total_pokok_sepuluh,
                'total_bunga_sepuluh' => $total_bunga_sepuluh,
                'total_pokok_sebelas' => $total_pokok_sebelas,
                'total_bunga_sebelas' => $total_bunga_sebelas,
                'total_pokok_duabelas' => $total_pokok_duabelas,
                'total_bunga_duabelas' => $total_bunga_duabelas,
                'total_pokok_tigabelas' => $total_pokok_tigabelas,
                'total_bunga_tigabelas' => $total_bunga_tigabelas,
                'total_pokok_empatbelas' => $total_pokok_empatbelas,
                'total_bunga_empatbelas' => $total_bunga_empatbelas,
                'total_pokok_limabelas' => $total_pokok_limabelas,
                'total_bunga_limabelas' => $total_bunga_limabelas,
                'total_pokok_enambelas' => $total_pokok_enambelas,
                'total_bunga_enambelas' => $total_bunga_enambelas,
                'total_pokok_tujuhbelas' => $total_pokok_tujuhbelas,
                'total_bunga_tujuhbelas' => $total_bunga_tujuhbelas,
                'total_pokok_delapanbelas' => $total_pokok_delapanbelas,
                'total_bunga_delapanbelas' => $total_bunga_delapanbelas,
                'total_pokok_sembilanbelas' => $total_pokok_sembilanbelas,
                'total_bunga_sembilanbelas' => $total_bunga_sembilanbelas,
                'total_pokok_duapuluh' => $total_pokok_duapuluh,
                'total_bunga_duapuluh' => $total_bunga_duapuluh,
                'total_pokok_duasatu' => $total_pokok_duasatu,
                'total_bunga_duasatu' => $total_bunga_duasatu,
                'tahun' => $year,
                'user' => Detailkpr::count(),
                'pengelola' => User::where('role', 1)->count(),
                'admin' => User::where('role', 0)->count(),
                'pangkats' => Pangkat::count()
            ]
        );
    }

    public function index(Request $request)
    {
        $currentYear = $request->tahun;
        if (!$request->tahun) {
            $currentYear = date('Y');
        }
        

        $data = Detailkpr::select('tmt_angsuran', 'jml_tunggakan', 'pinjaman', 'pokok', 'bunga')->whereYear('tmt_angsuran', $request->tahun);
        $totalTunggakan = $data->sum('jml_tunggakan');
        $totalPinjaman = $data->sum('pinjaman');
        $user = Detailkpr::count();
        
        return view('admin.rekapdata.tahun.index', compact('currentYear', 'totalTunggakan', 'totalPinjaman', 'user'));
    }
}
