<?php

// Example: app/Http/Controllers/ImageHistoryController.php
namespace App\Http\Controllers;

// ImageHistoryController.php
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageHistoryController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();
        return view('storage', compact('images'));
    }


    public function showStorage($id) {
        $images = Image::all(); // Assuming you have an "Image" model
    
        return view('storage', ['images' => $images]);
    }
    

    public function destroy($id)
    {
        try {
            $image = Image::findOrFail($id);

            // Check if there is only one image remaining
            $imageCount = Image::count();
            if ($imageCount === 1) {
                return response()->json(['error' => 'Cannot delete the only remaining image.'], 400);
            }

            // Delete the image file from storage
            $imagePath = public_path('images/' . $image->filename);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Delete the image record from the database
            $image->delete();

            return response()->json(['message' => 'Image deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}