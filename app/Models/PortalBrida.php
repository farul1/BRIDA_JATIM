<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalBrida extends Model
{
    use HasFactory;


    protected $table = 'portal_brida';

    protected $fillable = ['nama', 'link', 'logo', 'deskripsi'];
}
