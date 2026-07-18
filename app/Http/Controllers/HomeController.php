<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        
        $categories = Category::withCount('articles')->get();
        
        return view('home', compact('articles', 'categories'));
    }

    public function dashboard()
    {
        $totalArticles = Article::count();
        $totalCategories = Category::count();
        $recentArticles = Article::orderBy('created_at', 'desc')->limit(5)->get();
        
        return view('admin.dashboard', compact('totalArticles', 'totalCategories', 'recentArticles'));
    }
}