<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::published()->orderBy('published_at', 'desc')->take(3)->get();
        return view('user.pages.home', compact('latestNews'));
    }
}