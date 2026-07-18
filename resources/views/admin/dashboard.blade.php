@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Dashboard Admin</h1>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Artikel</h5>
                    <p class="display-4">{{ $totalArticles }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Kategori</h5>
                    <p class="display-4">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="row mb-4">
        <div class="col-md-12">
            <a href="{{ route('admin.articles.create') }}" class="btn btn-success">
                + Buat Artikel Baru
            </a>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-info">
                + Buat Kategori Baru
            </a>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
                Kelola Artikel
            </a>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                Kelola Kategori
            </a>
        </div>
    </div>

    <!-- Recent Articles -->
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Artikel Terbaru</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentArticles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>
                                @if ($article->is_published)
                                    <span class="badge bg-success">Dipublikasikan</span>
                                @else
                                    <span class="badge bg-warning">Draft</span>
                                @endif
                            </td>
                            <td>{{ $article->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada artikel</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection