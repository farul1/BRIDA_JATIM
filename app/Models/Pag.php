<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pag extends Model
{
    use HasFactory;

    protected $table = "pags";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'gap_id', 'tahun', 'kode_program', 'jumlah_anggaran'
    ];

    public function gap()
    {
        return $this->belongsTo(Gap::class, 'gap_id', 'id');
    }

    public function kak()
    {
        return $this->hasOne(Kak::class, 'pag_id', 'id');
    }
}