<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentars';
    protected $fillable = [
        'id_berita',
        'name',
        'email',
        'comment',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'id_berita', 'id');
    }
}
