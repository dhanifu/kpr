<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailkpr extends Model
{
    protected $table = 'kpr';
    // protected $fillable = ['nama','pangkat','nrp','kesatuan','tahap','pinjaman','jk_waktu','jml_angsuran','jml_angs','angs_ke','angsuran_masuk','tunggakan','jml_tunggakan','keterangan', 'status'];
    protected $guarded  = [];
    public function users()
    {
        return $this->belongsTo(User::class,'nrp');
    }
}
