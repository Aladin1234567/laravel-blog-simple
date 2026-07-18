@extends('layouts.app')

@section('title', 'Kategori: ' . $category->name)

@section('content')
<div class="container mt-5">
    <h1 class="mb-2">{{ $category->name }}</h1>
    <p class="text-muted mb-4">{{ $category->description }}</p>

    <div class="row">
        <div class="col-lg-8">
            @forelse ($articles as $article)
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('article.show', $article->slug) }}" class="text-decoration-none">
                                {{ $article->title }}
                            </a>
                        </h5>
                        <p class="text-muted small">{{ $article->created_at->format('d M Y') }}</p>
                        <p class="card-text">{{ Str::limit($article->content, 150) }}</p>
                        <a href="{{ route('article.show', $article->slug) }}" class="btn btn-sm btn-primary">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">Tidak ada artikel di kategori ini.</div>
            @endforelse

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $articles->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Informasi Kategori</h5>
                </div>
                <div class="card-body">
                    <p>{{ $category->description }}</p>
                    <a href="/" class="btn btn-secondary btn-sm">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection