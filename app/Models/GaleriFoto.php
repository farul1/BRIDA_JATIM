<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriFoto extends Model
{
    use HasFactory;

    protected $table = "galeri_fotos";
    protected $primaryKey = "id";

    protected $fillable = [
        'judul',
        'description',
        'thumbnail',
    ];

    public function foto()
    {
        return $this->hasMany(Foto::class, 'id_galeri', 'id');
    }

}
