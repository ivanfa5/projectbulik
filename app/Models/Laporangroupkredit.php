<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporangroupkredit extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodeperkiraan',
        'keterangan',
        'totalkredit',
    ];
}
