<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SakipData extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'id_kategori',
        'file',
        'keterangan',
        'gambar',
    ];

    public function kategori()
    {
        return $this->belongsTo(SakipKategori::class, 'id_kategori');
    }

}
