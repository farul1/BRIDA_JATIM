<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilData extends Model
{
    use HasFactory;

    protected $table = "profil_data";

    protected $fillable = [
        'judul',
        'description',
        'id_kategori',
        'file'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the kategori that owns the ProfilData
     */
    public function profilkategori()
    {
        return $this->belongsTo(ProfilKategori::class, 'id_kategori');
    }

    /**
     * Get the file URL
     */
    public function getFileUrlAttribute()
    {
        return $this->file ? asset('file_upload/profil_data/file/' . $this->file) : null;
    }
}
