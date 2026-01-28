<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index(Request $request)
    {
        $query = Publication::query();
        
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('authors', 'like', '%' . $request->search . '%')
                  ->orWhere('venue', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }
        
        if ($request->has('year') && $request->year) {
            $query->where('year', $request->year);
        }
        
        $publications = $query->latest()->paginate(10);
        return view('admin.pages.research.publications.index', compact('publications'));
    }

    public function create()
    {
        return view('admin.pages.research.publications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string',
            'venue' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'type' => 'required|in:journal,conference,book',
            'doi' => 'nullable|string',
            'volume' => 'nullable|string',
            'pages' => 'nullable|string',
            'isbn' => 'nullable|string',
            'publisher' => 'nullable|string'
        ]);

        Publication::create($request->all());

        return redirect()->route('admin.research.publications.index')->with('success', 'Publication berhasil ditambahkan!');
    }

    public function edit(Publication $publication)
    {
        return view('admin.pages.research.publications.edit', compact('publication'));
    }

    public function update(Request $request, Publication $publication)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string',
            'venue' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 5),
            'type' => 'required|in:journal,conference,book',
            'doi' => 'nullable|string',
            'volume' => 'nullable|string',
            'pages' => 'nullable|string',
            'isbn' => 'nullable|string',
            'publisher' => 'nullable|string'
        ]);

        $publication->update($request->all());

        return redirect()->route('admin.research.publications.index')->with('success', 'Publication berhasil diperbarui!');
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect()->route('admin.research.publications.index')->with('success', 'Publication berhasil dihapus!');
    }
}