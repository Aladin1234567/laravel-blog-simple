@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <article>
                <h1 class="mb-3">{{ $article->title }}</h1>
                
                <p class="text-muted">
                    <small>
                        Kategori: 
                        <a href="{{ route('category.show', $article->category->slug) }}">
                            {{ $article->category->name }}
                        </a>
                        | {{ $article->created_at->format('d F Y') }}
                    </small>
                </p>

                <hr>

                <div class="card mb-4">
                    <div class="card-body">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </div>

                <hr>

                <a href="/" class="btn btn-secondary">← Kembali</a>
            </article>
        </div>

        <div class="col-lg-4">
            @if ($relatedArticles->count() > 0)
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Artikel Terkait</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($relatedArticles as $related)
                            <div class="mb-3">
                                <h6>
                                    <a href="{{ route('article.show', $related->slug) }}" class="text-decoration-none">
                                        {{ $related->title }}
                                    </a>
                                </h6>
                                <small class="text-muted">{{ $related->created_at->format('d M Y') }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection