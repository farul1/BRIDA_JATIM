<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoWeb extends Model
{
    use HasFactory;

    protected $table = 'info_webs'; // pastikan nama tabel sesuai

    // Tambahkan kolom yang bisa diisi massal
    protected $fillable = [
        'profil',
        'tugas_pokok',
        'tujuan',
        'tentang_kami',
        'struktur_organisasi',
    ];

    // Jika menggunakan timestamp tapi tabel tidak ada kolom created_at/updated_at
    // public $timestamps = false;
}
