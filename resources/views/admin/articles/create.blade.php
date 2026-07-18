@extends('layouts.app')

@section('title', 'Buat Artikel')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8 mx-auto">
            <h1>Buat Artikel Baru</h1>
        </div>
    </div>

    <div class="card shadow mx-auto" style="max-width: 700px;">
        <div class="card-body">
            <form action="{{ route('admin.articles.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        required
                    >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input 
                        type="text" 
                        class="form-control @error('slug') is-invalid @enderror" 
                        id="slug"
                        name="slug"
                        value="{{ old('slug') }}"
                        required
                    >
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select 
                        class="form-control @error('category_id') is-invalid @enderror" 
                        id="category_id"
                        name="category_id"
                        required
                    >
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Isi</label>
                    <textarea 
                        class="form-control @error('content') is-invalid @enderror" 
                        id="content"
                        name="content"
                        rows="8"
                        required
                    >{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input 
                            type="checkbox" 
                            class="form-check-input" 
                            id="is_published"
                            name="is_published"
                            value="1"
                            {{ old('is_published') ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="is_published">
                            Publikasikan artikel
                        </label>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Artikel</button>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection