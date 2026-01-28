<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::published()->orderBy('published_at', 'desc')->get();
        return view('user.pages.news.index', compact('news'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->published()->firstOrFail();
        return view('user.pages.news.show', compact('news'));
    }
}