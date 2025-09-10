<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Rating;
use App\Models\Gap; // Import model Gap
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Import Carbon untuk mengelola tanggal

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // DIUBAH: Logika penghitungan pengunjung ditulis ulang dengan cara standar
        $count_pengunjung_hari_ini = Visitor::whereDate('visit_date', Carbon::today())->sum('hits');
        $count_pengunjung_kemarin = Visitor::whereDate('visit_date', Carbon::yesterday())->sum('hits');
        $count_total_pengunjung = Visitor::sum('hits');

        // Menggunakan number_format agar tampilan lebih rapi di view
        $rata_rating = number_format(Rating::avg('nilai'), 2);

        // Menggunakan Eloquent Model agar lebih konsisten
        $arr_tanggal_visit = Visitor::select('visit_date', DB::raw('sum(hits) as total'))
                                    ->groupBy('visit_date')
                                    ->orderBy('visit_date', 'asc')
                                    ->get();

        $arr_count_pprg = Gap::select('status', DB::raw('count(id) as total')) // Menggunakan count(id) lebih tepat
                                ->groupBy('status')
                                ->orderBy('status', 'asc')
                                ->get();

        return view('public_admin.home', compact(
            'count_pengunjung_hari_ini',
            'count_pengunjung_kemarin',
            'count_total_pengunjung',
            'rata_rating',
            'arr_tanggal_visit',
            'arr_count_pprg'
        ));
    }
}
