<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodetransaksi',
        'tanggaltransaksi',
        'kdperkiraan',
        'keterangan',
        'transaksidebit',
        'transaksikredit',
    ];

    public function panggilPerkiraan(){
        return $this->hasOne(Perkiraan::class,'kodeperkiraan','kdperkiraan');    
    }
}
