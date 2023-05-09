<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'transaksi_ewallet';

    protected $fillable = [
        'id_user',
        'id_bisnis_kuliner',
        'id_nota',
        'jumlah_transaksi',
        'tipe_transaksi',
        'bukti_transfer',
        'status_topup'
    ];
}
