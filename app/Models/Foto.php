<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    // Tambahkan fillable supaya mass assignment bisa berjalan
    protected $fillable = [
        'id_galeri',
        'judul',
        'description',
        'gambar',
    ];

    // Relasi ke GaleriFoto
public function galeriFoto()
{
    return $this->belongsTo(GaleriFoto::class, 'id_galeri', 'id');
}

}
