<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormValidasi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'form_validasi';

    protected $fillable = [
        'id_user',
        'nama_bisnis',
        'alamat_bisnis',
        'nama_pemilik',
        'no_ktp',
        'alamat_pemilik',
        'no_telp_pemilik',
        'email_pemilik',
        'foto_ktp',
        'foto_selfie_ktp',
        'no_rekening',
        'nama_rekening',
        'bank_rekening',
        'validasi_admin'
    ];
}
