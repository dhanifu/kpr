<?php

namespace App\Http\Controllers;

use App\Detailkpr;
use App\Pangkat;
use App\User;
use App\Chart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $year = Carbon::now()->format('Y');
        $tahunini = DB::table('kpr')->whereYear('tmt_angsuran', $year);
        $jumlahpinjamantahun = $tahunini->sum('pinjaman');
        $totaltunggakantahun = $tahunini->sum('jml_tunggakan');
        $total_pokok_tahun = $tahunini->sum('pokok');
        $total_bunga_tahun = $tahunini->sum('bunga');
        
        
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

        $jumlahpinjaman = Detailkpr::sum('pinjaman');
        $totaltunggakan = Detailkpr::sum('jml_tunggakan');

        $users = User::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count')->all();

                    $groups = User::select('role', DB::raw('count(*) as total'))
            ->groupBy('role')
            ->pluck('total', 'role')->all();

        for ($i = 0; $i <= count($groups); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        $chart = new Chart;
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;

        return view('home',compact('chart'), [
            'total_pokok_otomatis' => $total_pokok_otomatis,
            'total_bunga_otomatis' => $total_bunga_otomatis,
            'total_pokok_tahun' => $total_pokok_tahun,
            'total_bunga_tahun' => $total_bunga_tahun,
            'total_pokok' => $total_pokok,
            'total_bunga' => $total_bunga,
            'jumlahpinjaman' => $jumlahpinjaman,
            'totaltunggakan' => $totaltunggakan,
            'jumlahpinjamantahun' => $jumlahpinjamantahun,
            'totaltunggakantahun' => $totaltunggakantahun,
            'user' => Detailkpr::count(),
            'pengelola' => User::where('role', 1)->count(),
            'admin' => User::where('role', 0)->count(),
            'pangkats' => Pangkat::count()
        ]);
    }
    public function kalkulator()
    {
        return view('admin.kalkulator.index');
    }
    public function HitungKalkulator(Request $request)
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
        for ($i = 1; $i < $jangka+1; $i++) {

            if ($no == 13) {
                $ang_bunga = $besar_pinjaman * $bungapersen / 12;
                $angsuran_bunga = round($ang_bunga,2);
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
        $array_all = ['bunga'=>$array1,
        'pokok'=>$array2,
        'pinjaman'=>$array3,
    ];
        // return response()->json($array_all);
        return view('admin.kalkulator.show',[
            'all' => $array_all,
            'besar_angsuran'=>$besar_angsuran,
            'no' => intval($jangka)
            ]);
            // 'ang_bunga' => $array1,
            // 'ang_pokok' => $array2,
            // 'besar_pinjaman' => $array3
    }
}
