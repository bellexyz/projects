<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class CrudDashboardController extends Controller
{
    public function showForm()
    {
        $image = Image::latest()->first();

        if (!$image) {
            $image = new Image();
        }

        $imageName = $image->filename;
        $name = $image->name; 

        return view('crud-dashboard', compact('image', 'name', 'imageName'));
    }

    public function uploadImage(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = time().'.'.$request->image->extension();

    $request->image->move(public_path('images'), $imageName);

    Image::create(['filename' => $imageName]);

    return redirect()->route('crud-dashboard.showForm')
        ->with('success');
}
public function updateName(Request $request)
{
    $request->validate([
        'editable_name' => 'required|string|max:255',
    ]);

    $image = Image::latest()->first();

    if (!$image) {
        $image = new Image();
    }

    $image->name = $request->editable_name;
    $image->save();

    return redirect()->route('main-dashboard.index')
        ->with('success');
    }
}