<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikBisnisKuliner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pemilik_bisnis_kuliner';

    protected $fillable = [
        'id_user',
        'nama_pemilik',
        'no_ktp',
        'jenis_kelamin',
        'alamat_pemilik',
        'no_telp',
        'email_pemilik',
        'no_rekening',
        'nama_rekening',
        'bank_rekening'
    ];
}
