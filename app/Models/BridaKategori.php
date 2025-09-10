<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BridaKategori extends Model
{
    use HasFactory;

    protected $table = 'brida_kategori';

    protected $fillable = [
        'nama_kategori',
        'link',
        'status',
    ];
}
