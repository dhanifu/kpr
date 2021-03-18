<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    protected $table = 'angsuran';
    protected $fillable =['pokok','bunga','besar_angsuran','pinjama_pokok','anuitas','bunga_id'];
    public function bunga()
    {
        return $this->belongsTo(Bunga::class,'bunga_id','id');
    }
}
