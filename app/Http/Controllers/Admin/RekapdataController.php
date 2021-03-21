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
            'user' => User::whereIn('role', ['2', '3'])->count(),
            'pengelola' => User::where('role', 1)->count(),
            'admin' => User::where('role', 0)->count(),
            'pangkats' => Pangkat::count()
        ]);
    }
    public function getTahun()
    {
        $year = Carbon::now()->format('Y');
        $tahunini = DB::table('kpr')->whereYear('tmt_angsuran', $year);
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

        return view(
            'admin.rekapdata.tahun.index',
            compact('chart'),
            [
                'jumlahpinjaman' => $jumlahpinjaman,
                'totaltunggakan' => $totaltunggakan,
                'user' => User::whereIn('role', ['2', '3'])->count(),
                'pengelola' => User::where('role', 1)->count(),
                'admin' => User::where('role', 0)->count(),
                'pangkats' => Pangkat::count()
            ]
        );
    }
}
