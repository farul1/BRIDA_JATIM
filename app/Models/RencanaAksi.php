<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaAksi extends Model
{
    use HasFactory;

    protected $table = 'rencana_aksis'; 
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'gap_id',  // ubah dari 'id_gap' ke 'gap_id'
        'uraian',
        'input',
        'output',
        'outcome',
    ];

    // Relasi ke Gap
    public function gap()
    {
        return $this->belongsTo(Gap::class, 'gap_id', 'id'); // ubah 'id_gap' ke 'gap_id'
    }
}
