<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchProject;
use Illuminate\Http\Request;

class ResearchProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = ResearchProject::query();
        
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('funding_source', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        
        if ($request->has('year') && $request->year) {
            $query->where('year', 'like', '%' . $request->year . '%');
        }
        
        $projects = $query->latest()->paginate(10);
        return view('admin.pages.research.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.pages.research.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'funding_source' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 10),
            'status' => 'required|in:ongoing,completed,cancelled'
        ]);

        ResearchProject::create($request->all());

        return redirect()->route('admin.research.projects.index')->with('success', 'Research project berhasil ditambahkan!');
    }

    public function edit(ResearchProject $project)
    {
        return view('admin.pages.research.projects.edit', compact('project'));
    }

    public function update(Request $request, ResearchProject $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'funding_source' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 10),
            'status' => 'required|in:ongoing,completed,cancelled'
        ]);

        $project->update($request->all());

        return redirect()->route('admin.research.projects.index')->with('success', 'Research project berhasil diperbarui!');
    }

    public function destroy(ResearchProject $project)
    {
        $project->delete();
        return redirect()->route('admin.research.projects.index')->with('success', 'Research project berhasil dihapus!');
    }
}