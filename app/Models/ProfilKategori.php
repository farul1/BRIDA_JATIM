<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProfilKategori extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profil_kategoris'; // Opsional jika sudah mengikuti konvensi Laravel

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_kategori',
        'link',
        'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean', // Cast kolom status ke tipe boolean
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the profildata associated with the kategori.
     */
    public function profildata(): HasMany
    {
        return $this->hasMany(ProfilData::class, 'profil_kategori_id'); // Tambahkan foreign key jika berbeda
    }

    /**
     * Scope untuk kategori aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('status', true);
    }

    /**
     * Accessor untuk nama kategori dengan format tertentu
     */
    public function getNamaKategoriFormattedAttribute(): string
    {
        return ucwords(strtolower($this->nama_kategori));
    }
}
