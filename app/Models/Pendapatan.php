<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pendapatan';

    protected $fillable = [
        'id_bisnis_kuliner',
        'id_nota',
        'total_harga',
        'komisi',
        'pendapatan_bersih',
        'tanggal_pendapatan',
        'status_transfer'
    ];
}
