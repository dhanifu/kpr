<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjamans';
    protected $guarded  = [];
    public function angsuran()
    {
        return $this->hasMany(Angsuran::class);
    }
}
