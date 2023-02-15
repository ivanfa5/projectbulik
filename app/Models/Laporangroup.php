<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporangroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodeperkiraan',
        'totaldebit',
        'bulan',
        'tahun',
    ];
}