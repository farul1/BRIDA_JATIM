<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Visitor extends Model
{
    use HasFactory;

    public $attributes = ['hits' => 0];

    protected $guarded = ['id'];

    public $timestamps = false;


    public static function boot()
    {
        parent::boot();
        // When a new instance of this model is created...
        static::creating(function ($visitor) {
            $visitor->hits = 0;
        });

        // Any time the instance is saved (create OR update)
        static::saving(function ($visitor) {
            $visitor->visit_date = date('Y-m-d');
            $visitor->visit_time = date('H:i:s');
            $visitor->hits++;
        });
    }

    // Fill in the IP and today's date
    public function scopeCurrent($query)
    {
        return $query->where('ip', $_SERVER['REMOTE_ADDR'])->where('date', date('Y-m-d'));
    }

    public static function hit()
    {
        static::firstOrCreate([
            'ip' => $_SERVER['REMOTE_ADDR'],
            'date' => date('Y-m-d'),
        ])->save();
    }
    public static function count_pengunjung_hari_ini()
    {
        $count_pengunjung_hari_ini = DB::table('visitors')
        ->where('visit_date', '=', date('Y-m-d'))
        ->sum('hits');
        return $count_pengunjung_hari_ini;
    }
    public static function count_pengunjung_kemarin()
    {
        $count_pengunjung_kemarin = DB::table('visitors')
        ->where('visit_date', '=', date('Y-m-d',strtotime("-1 days")))
        ->sum('hits');
        return $count_pengunjung_kemarin;
    }
    public static function count_total_pengunjung()
    {
        $count_total_pengunjung = DB::table('visitors')
        ->sum('hits');
        return $count_total_pengunjung;
    }
}
