<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Berita extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beritas'; // Opsional jika sudah mengikuti konvensi Laravel

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'description', // Perhatikan konsistensi dengan field di database
        'deskripsi',    // Jika ini juga ada di database
        'tanggal',
        'gambar'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'date', // Cast kolom tanggal ke tipe date
    ];


    public function galeri(): HasMany
    {
        return $this->hasMany(Komentar::class);
    }

    /**
     * Get the path/URL for the gambar.
     * Helper method untuk mendapatkan URL gambar lengkap
     */
    public function getGambarUrlAttribute(): ?string
    {
        if (!$this->gambar) {
            return null;
        }
        return asset('file_upload/berita/' . $this->gambar);
    }
}
