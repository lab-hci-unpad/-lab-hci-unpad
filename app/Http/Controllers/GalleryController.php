<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::where('is_published', true);
        
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category', $request->category);
        }
        
        $projects = $query->orderBy('created_at', 'desc')->get();
        
        return view('user.pages.gallery.index', compact('projects'));
    }
    
    public function show(Gallery $gallery)
    {
        return view('user.pages.gallery.show', compact('gallery'));
    }
}
