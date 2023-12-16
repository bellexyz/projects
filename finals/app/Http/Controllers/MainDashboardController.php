<?php

namespace App\Http\Controllers;

use App\Models\Image;

class MainDashboardController extends Controller
{
    public function index()
    {
        $latestImage = Image::latest()->first();

        return view('main-dashboard', compact('latestImage'));
    }

}


