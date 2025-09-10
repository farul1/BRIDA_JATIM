<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $rating = Rating::all();
        return view('public_admin.rating.index',compact('rating'));

    }
}
