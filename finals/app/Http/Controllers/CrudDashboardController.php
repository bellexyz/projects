<?php

namespace App\Http\Controllers;

// app/Http/Controllers/CrudDashboardController.php

// app/Http/Controllers/CrudDashboardController.php

use App\Models\Image;
use Illuminate\Http\Request;

class CrudDashboardController extends Controller
{
    public function showForm()
    {
        // Get the latest Image record
        $image = Image::latest()->first();

        // If no image is found, create an empty image object
        if (!$image) {
            $image = new Image();
        }

        // Retrieve the associated name from the same record
        $imageName = $image->filename;
        $name = $image->name; // Assuming 'name' is the field in your images table

        return view('crud-dashboard', compact('image', 'name', 'imageName'));
    }

    public function uploadImage(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Generate a unique filename for the new image
    $imageName = time().'.'.$request->image->extension();

    // Move the uploaded image to the public/images folder
    $request->image->move(public_path('images'), $imageName);

    // Create a new Image record for the uploaded image
    Image::create(['filename' => $imageName]);

    return redirect()->route('crud-dashboard.showForm')
        ->with('success');
}
public function updateName(Request $request)
{
    $request->validate([
        'editable_name' => 'required|string|max:255',
    ]);

    // Get the latest Image record
    $image = Image::latest()->first();

    // If no image is found, create an empty image object
    if (!$image) {
        $image = new Image();
    }

    // Update the name field
    $image->name = $request->editable_name;
    $image->save();

    return redirect()->route('main-dashboard.index')
        ->with('success');
}


}