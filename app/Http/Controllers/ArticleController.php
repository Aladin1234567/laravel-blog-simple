<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'byCategory']);
    }

    public function index()
    {
        $articles = Article::with('category')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:articles',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'boolean',
        ]);

        Article::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dibuat!');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:articles,slug,' . $article->id,
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'boolean',
        ]);

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diubah!');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus!');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $relatedArticles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->limit(3)
            ->get();
        
        return view('article', compact('article', 'relatedArticles'));
    }

    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $articles = $category->articles()->where('is_published', true)->paginate(6);
        
        return view('category', compact('category', 'articles'));
    }
}