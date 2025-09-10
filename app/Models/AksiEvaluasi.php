<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksiEvaluasi extends Model
{
    use HasFactory;

    protected $table = 'aksi_evaluasis';
    protected $fillable = ['id_indikator', 'uraian']; // Disederhanakan, hapus 'output' dan 'outcome' jika tidak digunakan

    public function indikatorEvaluasi()
    {
        return $this->belongsTo(IndikatorEvaluasi::class, 'id_indikator');
    }
}