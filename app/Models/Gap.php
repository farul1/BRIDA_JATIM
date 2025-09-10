<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gap extends Model
{
    use HasFactory;

    protected $table = 'gaps'; // pastikan ini 'gaps'
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'kebijakan', 'program', 'tujuan', 'sasaran', 'data_pembukaan_wawasan',
        'akses', 'partisipasi', 'kontrol', 'manfaat', 'sebab_faktor_internal',
        'sebab_faktor_eksternal', 'reformulasi_tujuan', 'basis_data',
        'indikator_output', 'indikator_outcome', 'status'
    ];

    public function rencanaAksi()
    {
        return $this->hasMany(RencanaAksi::class, 'gap_id', 'id');
    }

    public function pag()
    {
        return $this->hasOne(Pag::class, 'gap_id', 'id');
    }
}
