<?php

namespace App\Http\Controllers;

use App\Models\Layanan;

class HomeController extends Controller
{
    public function index()
    {
        $studioServices = Layanan::where('location_type', 'studio')->get();
        $homeServices = Layanan::where('location_type', 'home')->get();

        return view('home', compact('studioServices', 'homeServices'));
    }
}