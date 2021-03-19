<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pangkat;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pangkats = Pangkat::paginate(5);
        return view('admin.pangkat.index',compact('pangkats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validasi($request);
        Pangkat::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pangkat  $pangkat
     * @return \Illuminate\Http\Response
     */
    public function show(Pangkat $pangkat)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pangkat  $pangkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Pangkat $pangkat)
    {
        return view('admin.pangkat.edit',compact('pangkat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pangkat  $pangkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pangkat $pangkat)
    {
        $this->_validasi($request);
        $pangkat->update($request->all());
        return redirect()->route('admin.pangkat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pangkat  $pangkat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pangkat = Pangkat::findOrFail($id);
        $pangkat->delete();
        return back();
    }

    public function _validasi(Request $request)
    {
        $validation = $request->validate([
            'pangkat' => 'required',
            'corps' => 'required',
            'kesatuan' => 'required',
            'tahap' => 'required',
        ],
        [
            'pangkat.required' => 'Petugas harus ada!',
            'corps.required' => 'Nisn harus ada!',
            'kesatuan.required' => 'tanggal bayar harus ada!',
            'tahap.required' => 'bulan bayar harus ada!',
        ]);
    }
}
