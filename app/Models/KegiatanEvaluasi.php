<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanEvaluasi extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_evaluasis';
    protected $fillable = ['uraian', 'id_program'];

    public function program()
    {
        return $this->belongsTo(ProgramEvaluasi::class, 'id_program');
    }

    public function indikatorEvaluasi()
    {
        return $this->hasMany(IndikatorEvaluasi::class, 'id_kegiatan');
    }
}