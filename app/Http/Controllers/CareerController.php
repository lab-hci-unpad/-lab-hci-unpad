<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;

class CareerController extends Controller
{
    public function index()
    {
        $jobPostings = JobPosting::active()->orderBy('created_at', 'desc')->get();
        return view('user.pages.career', compact('jobPostings'));
    }
}