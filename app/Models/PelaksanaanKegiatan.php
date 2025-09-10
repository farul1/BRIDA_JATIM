<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaksanaanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'pelaksanaan_kegiatans';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_kak', // Sesuaikan dengan nama kolom di database
        'label',
        'uraian'
    ];

    public function kak()
    {
        return $this->belongsTo(Kak::class, 'id_kak', 'id');
    }
}