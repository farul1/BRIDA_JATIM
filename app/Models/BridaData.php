<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BridaData extends Model
{
    use HasFactory;

    protected $table = 'brida_data';

    protected $fillable = [
        'judul',
        'id_kategori',
        'gambar',
        'file',
        'description',
        'keterangan',
        'nama',
    ];

    public function kategori()
    {
        return $this->belongsTo(BridaKategori::class, 'id_kategori');
    }
}
