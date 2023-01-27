<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkiraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodeperkiraan',
        'namaperkiraan',
        'jenisperkiraan',
    ];
}
