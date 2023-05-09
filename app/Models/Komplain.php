<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'form_komplain';

    protected $fillable = [
        'id_nota',
        'deskripsi_komplain',
        'gambar_komplain',
        'sender'
    ];
}
