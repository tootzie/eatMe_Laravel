<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBundle extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_bundle';
    protected $fillable = [
        'id_menu',
        'isi_bundle',
        'deskripsi',
    ];
}
