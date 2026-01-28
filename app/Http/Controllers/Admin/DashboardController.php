<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Gallery;
use App\Models\User;
use App\Models\Publication;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_news' => News::count(),
            'published_news' => News::where('status', 'published')->count(),
            'total_gallery' => Gallery::count(),
            'total_users' => User::count(),
            'total_publications' => Publication::count(),
        ];

        $recent_news = News::latest()->take(5)->get();
        $recent_users = User::latest()->take(5)->get();

        // Chart data - Fixed format
        $news_by_month = [];
        $users_by_month = [];
        
        // Initialize all months with 0
        for ($i = 1; $i <= 12; $i++) {
            $news_by_month[$i] = 0;
            $users_by_month[$i] = 0;
        }
        
        // Get actual data
        $newsData = News::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();
            
        $usersData = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();
        
        // Merge with initialized array
        $news_by_month = array_merge($news_by_month, $newsData);
        $users_by_month = array_merge($users_by_month, $usersData);

        $news_status_data = [
            ['id' => 'Published', 'value' => News::where('status', 'published')->count()],
            ['id' => 'Draft', 'value' => News::where('status', 'draft')->count()],
        ];

        return view('admin.dashboard', compact('stats', 'recent_news', 'recent_users', 'news_by_month', 'users_by_month', 'news_status_data'));
    }
}