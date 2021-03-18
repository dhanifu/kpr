<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bunga extends Model
{
    protected $table = 'bunga';
    protected $fillable =['pinjaman','jumlah_angsuran','bunga','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function angsuran()
    {
        return $this->hasOne(Angsuran::class);
    }
}
