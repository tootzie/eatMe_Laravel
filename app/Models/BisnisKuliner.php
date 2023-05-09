<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BisnisKuliner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'bisnis_kuliner';

    protected $fillable = [
        'id_pemilik_bisnis_kuliner',
        'nama_bisnis',
        'alamat_bisnis',
        'no_telp',
        'kategori_makanan',
        'jam_ambil_awal',
        'jam_ambil_akhir',
        'status_validasi',
        'status_bisnis',
        'rating_bisnis',
        'foto_profil'
    ];
}
