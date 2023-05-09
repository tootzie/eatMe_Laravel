<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_bisnis_kuliner', 
        'isBundle',
        'nama_makanan', 
        'harga_makanan', 
        'harga_sebelum_diskon', 
        'deskripsi_makanan', 
        'foto_menu',
        'makanan_tersedia'
    ];
}
