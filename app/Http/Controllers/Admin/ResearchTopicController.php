<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResearchTopicController extends Controller
{
    public function index(Request $request)
    {
        $query = ResearchTopic::query();
        
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        $topics = $query->latest()->paginate(10);
        return view('admin.pages.research.topics.index', compact('topics'));
    }

    public function create()
    {
        return view('admin.pages.research.topics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean'
        ]);

        ResearchTopic::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.research.topics.index')->with('success', 'Research topic berhasil ditambahkan!');
    }

    public function edit(ResearchTopic $topic)
    {
        return view('admin.pages.research.topics.edit', compact('topic'));
    }

    public function update(Request $request, ResearchTopic $topic)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean'
        ]);

        $topic->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.research.topics.index')->with('success', 'Research topic berhasil diperbarui!');
    }

    public function destroy(ResearchTopic $topic)
    {
        $topic->delete();
        return redirect()->route('admin.research.topics.index')->with('success', 'Research topic berhasil dihapus!');
    }
}