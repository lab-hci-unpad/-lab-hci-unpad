<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchTopic;
use App\Models\ResearchProject;
use App\Models\Publication;

class ResearchController extends Controller
{
    public function topics()
    {
        $researchTopics = ResearchTopic::active()->orderBy('name')->get();
        $researchProjects = ResearchProject::orderBy('year', 'desc')->get();
        
        return view('user.pages.research.topics', compact('researchTopics', 'researchProjects'));
    }

    public function publications()
    {
        $publications = Publication::orderBy('year', 'desc')->get();
        $journalCount = Publication::byType('journal')->count();
        $conferenceCount = Publication::byType('conference')->count();
        $bookCount = Publication::byType('book')->count();
        
        return view('user.pages.research.publications', compact('publications', 'journalCount', 'conferenceCount', 'bookCount'));
    }
}