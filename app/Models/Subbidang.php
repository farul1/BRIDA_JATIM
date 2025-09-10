<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subbidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_bidang'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the bidang that owns the Subbidang
     */
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang');
    }
}
