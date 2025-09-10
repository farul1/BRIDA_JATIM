<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    public function subbidang()
    {
        return $this->belongsTo('App\Models\Subbidang','id_subbidang');
    }
    public function judul()
    {
        return $this->belongsTo('App\Models\Juduls','id_judul');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }
}
