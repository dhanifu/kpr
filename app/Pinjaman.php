<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjaman';
    protected $fillable =['jangka_waktu','jmlangs','angsuran_ke','angsuran_masuk','angsuran_tunggak','jumlah_tunggak','keterangan','angsuran_id','user_id','status'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function angsuran()
    {
        return $this->belongsTo(Angsuran::class,'angsuran_id','id');
    }
}
