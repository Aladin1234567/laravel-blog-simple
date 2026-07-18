@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container mt-5">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4 mb-3">Selamat Datang di Blog Sederhana</h1>
            <p class="lead text-muted">Temukan artikel menarik tentang teknologi, lifestyle, dan travel.</p>
        </div>
    </div>

    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <h2 class="mb-4">Artikel Terbaru</h2>
            
            @forelse ($articles as $article)
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('article.show', $article->slug) }}" class="text-decoration-none">
                                {{ $article->title }}
                            </a>
                        </h5>
                        <p class="text-muted small">
                            <i class="bi bi-folder"></i>
                            <a href="{{ route('category.show', $article->category->slug) }}" class="text-decoration-none">
                                {{ $article->category->name }}
                            </a>
                            | {{ $article->created_at->format('d M Y') }}
                        </p>
                        <p class="card-text">{{ Str::limit($article->content, 150) }}</p>
                        <a href="{{ route('article.show', $article->slug) }}" class="btn btn-sm btn-primary">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">Tidak ada artikel yang tersedia.</div>
            @endforelse

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $articles->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Kategori</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                            <li class="mb-2">
                                <a href="{{ route('category.show', $category->slug) }}" class="text-decoration-none">
                                    {{ $category->name }}
                                </a>
                                <span class="badge bg-secondary">{{ $category->articles_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tentang Blog</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted small">
                        Blog Sederhana adalah platform untuk berbagi pengetahuan dan pengalaman. 
                        Kami menyediakan artikel berkualitas tentang berbagai topik menarik.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection