<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'nota';

    protected $fillable = [
        'id_user',
        'id_bisnis_kuliner',
        'total_item',
        'total_harga',
        'status_nota',
        'tanggal_pengambilan',
        'pin_pengambilan',
        'rating_bisnis',
        'rating_user',
        'status_komplain'
    ];
}
