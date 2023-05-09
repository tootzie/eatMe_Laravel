<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'id_bisnis_kuliner',
        'id_menu',
        'id_detail_bundle',
        'id_nota',
        'jumlah_makanan',
        'catatan_makanan',
        'tanggal_pemesanan',
        'status_order',
        'keterangan_order',
    ];
}
