<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = JobPosting::query();
        
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        $jobs = $query->latest()->paginate(10);
        return view('admin.pages.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.pages.jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'quota' => 'required|integer|min:1',
            'qualifications' => 'required|array',
            'qualifications.*' => 'required|string',
            'status' => 'required|in:active,closed',
            'deadline' => 'required|date|after:today'
        ]);

        JobPosting::create($request->all());

        return redirect()->route('admin.jobs.index')->with('success', 'Job posting berhasil ditambahkan!');
    }

    public function edit(JobPosting $job)
    {
        return view('admin.pages.jobs.edit', compact('job'));
    }

    public function update(Request $request, JobPosting $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'quota' => 'required|integer|min:1',
            'qualifications' => 'required|array',
            'qualifications.*' => 'required|string',
            'status' => 'required|in:active,closed',
            'deadline' => 'required|date'
        ]);

        $job->update($request->all());

        return redirect()->route('admin.jobs.index')->with('success', 'Job posting berhasil diperbarui!');
    }

    public function destroy(JobPosting $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job posting berhasil dihapus!');
    }
}