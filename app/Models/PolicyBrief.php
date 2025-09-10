<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyBrief extends Model
{
    use HasFactory;

    protected $table = 'policy_briefs';

    protected $fillable = [
        'judul',
        'deskripsi',
        'file',
        'gambar',
    ];
}
