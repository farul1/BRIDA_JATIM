<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramEvaluasi extends Model
{
    use HasFactory;

    protected $table = 'program_evaluasis';
    protected $fillable = ['uraian', 'id_bidang']; // Diubah dari 'nama_program' menjadi 'uraian'

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang');
    }

    public function kegiatanEvaluasi()
    {
        return $this->hasMany(KegiatanEvaluasi::class, 'id_program');
    }
}