@extends('layouts.app')

@section('title', 'Buat Kategori')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6 mx-auto">
            <h1>Buat Kategori Baru</h1>
        </div>
    </div>

    <div class="card shadow mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                    >
                    @error('name')
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
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea 
                        class="form-control @error('description') is-invalid @enderror" 
                        id="description"
                        name="description"
                        rows="3"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Buat Kategori</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection