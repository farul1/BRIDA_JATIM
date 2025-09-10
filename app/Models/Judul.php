<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    use HasFactory;

    protected $table = 'judul';

    protected $fillable = [
        'judul',
        'id_bidang',
        'id_subbidang',
        'uraian',
        'tanggal'
    ];

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    /**
     * Get the bidang that owns the Judul
     */
public function bidang()
{
    return $this->belongsTo(Bidang::class, 'id_bidang')->withDefault([
        'nama_bidang' => 'Bidang tidak ditemukan'
    ]);
}

public function subBidang() // Pastikan nama ini konsisten
{
    return $this->belongsTo(Subbidang::class, 'id_subbidang')->withDefault([
        'nama' => 'Sub Bidang tidak ditemukan'
    ]);
}
    /**
     * Format tanggal untuk tampilan
     */
    public function getTanggalFormattedAttribute()
    {
        return $this->tanggal->format('d F Y');
    }
}
