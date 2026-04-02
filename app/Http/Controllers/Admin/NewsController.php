<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();
        
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        
        $news = $query->latest()->paginate(10);
        return view('admin.pages.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.pages.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'required|date'
        ]);

        $slug = Str::slug($request->title);
        
        // Handle featured image (opsional)
        $featuredImagePath = null;
        if ($request->hasFile('featured_image')) {
            $featuredImagePath = $request->file('featured_image')->store('news/featured');
        }
        
        // Handle gallery images
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('news/gallery');
            }
        }

        News::create([
            'title' => $request->title,
            'slug' => $slug,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'featured_image' => $featuredImagePath,
            'gallery_images' => $galleryImages ?: null,
            'status' => $request->status,
            'published_at' => $request->published_at
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(News $news)
    {
        return view('admin.pages.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'required|date'
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'status' => $request->status,
            'published_at' => $request->published_at
        ];

        // Handle featured image update - only if new file uploaded
        if ($request->hasFile('featured_image')) {
            // Delete old image from default disk if exists
            if ($news->featured_image) {
                Storage::delete($news->featured_image);
            }
            
            $featuredImagePath = $request->file('featured_image')->store('news/featured');
            $data['featured_image'] = $featuredImagePath;
        }

        // Handle gallery images update - only if new files uploaded
        if ($request->hasFile('gallery_images')) {
            // Delete old gallery images from default disk if exist
            if ($news->gallery_images) {
                foreach ($news->gallery_images as $oldImage) {
                    Storage::delete($oldImage);
                }
            }
            
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('news/gallery');
            }
            $data['gallery_images'] = $galleryImages;
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
    }
}