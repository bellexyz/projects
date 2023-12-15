<?php

namespace App\Http\Controllers;

// app/Http/Controllers/MainDashboardController.php

use App\Models\Image;

class MainDashboardController extends Controller
{
    public function index()
    {
        // Get the latest Image record
        $latestImage = Image::latest()->first();

        return view('main-dashboard', compact('latestImage'));
    }

}


