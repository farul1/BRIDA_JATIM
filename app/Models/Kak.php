<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kak extends Model
{
    use HasFactory;

    protected $table = 'kaks';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'pag_id', // ✅ SUDAH BENAR (sesuai database)
        'dasar_hukum', 
        'gambaran_umum', 
        'data_pembukaan_wawasan',
        'akses', 
        'partisipasi', 
        'kontrol', 
        'manfaat', 
        'internal', 
        'eksternal',
        'tujuan_kegiatan', 
        'penerima_manfaat', 
        'tempat', 
        'waktu_mulai',
        'waktu_selesai', 
        'subkegiatan', 
        'batasan_kegiatan', 
        'durasi',
        'penanggung_jawab', 
        'pelaksana', 
        'biaya'
    ];

    public function pag()
    {
        return $this->belongsTo(Pag::class, 'pag_id', 'id'); // ✅ SUDAH BENAR
    }

    public function pelaksanaanKegiatan()
    {
        return $this->hasMany(PelaksanaanKegiatan::class, 'kak_id', 'id');
    }
}