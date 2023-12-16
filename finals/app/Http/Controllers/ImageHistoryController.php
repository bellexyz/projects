<?php

namespace App\Http\Controllers;

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
        $images = Image::all(); 
    
        return view('storage', ['images' => $images]);
    }
    
    public function destroy($id)
    {
        try {
            $image = Image::findOrFail($id);

            $imageCount = Image::count();
            if ($imageCount === 1) {
                return response()->json(['error' => 'Cannot delete the only remaining image.'], 400);
            }

            $imagePath = public_path('images/' . $image->filename);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $image->delete();

            return response()->json(['message' => 'Image deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}