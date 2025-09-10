<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorEvaluasi extends Model
{
    use HasFactory;

    protected $table = 'indikator_evaluasis';
    protected $fillable = ['uraian', 'target', 'id_kegiatan'];

    public function kegiatanEvaluasi()
    {
        return $this->belongsTo(KegiatanEvaluasi::class, 'id_kegiatan');
    }

    public function aksiEvaluasi()
    {
        return $this->hasMany(AksiEvaluasi::class, 'id_indikator');
    }
}