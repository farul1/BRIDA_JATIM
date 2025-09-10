<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkBypass extends Model
{
    use HasFactory;

    protected $table = "link_bypass";

    protected $fillable = ['name', 'link'];
}
