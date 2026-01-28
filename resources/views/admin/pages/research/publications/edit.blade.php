@extends('admin.main')

@section('title', 'Edit Publikasi - Admin Lab HCI')
@section('page-title', 'Edit Publikasi')

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.research.publications.index') }}">Publikasi</a></li>
        <li class="breadcrumb-item active">Edit Publikasi</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Edit Publikasi</h2>
                <p class="text-muted mb-0">Edit publikasi penelitian Lab HCI</p>
            </div>
            <a href="{{ route('admin.research.publications.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Publikasi</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.research.publications.update', $publication) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">Judul Publikasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $publication->title) }}" placeholder="Masukkan judul publikasi" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="authors" class="form-label fw-semibold">Penulis <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('authors') is-invalid @enderror" id="authors" name="authors" value="{{ old('authors', $publication->authors) }}" placeholder="Nama penulis (pisahkan dengan koma)" required>
                        @error('authors')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="venue" class="form-label fw-semibold">Jurnal/Konferensi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('venue') is-invalid @enderror" id="venue" name="venue" value="{{ old('venue', $publication->venue) }}" placeholder="Nama jurnal atau konferensi" required>
                                @error('venue')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="year" class="form-label fw-semibold">Tahun <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $publication->year) }}" min="2000" max="{{ date('Y') + 1 }}" required>
                                @error('year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label fw-semibold">Tipe Publikasi <span class="text-danger">*</span></label>
                        <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                            <option value="">Pilih Tipe</option>
                            <option value="journal" {{ old('type', $publication->type) == 'journal' ? 'selected' : '' }}>Journal</option>
                            <option value="conference" {{ old('type', $publication->type) == 'conference' ? 'selected' : '' }}>Conference</option>
                            <option value="workshop" {{ old('type', $publication->type) == 'workshop' ? 'selected' : '' }}>Workshop</option>
                            <option value="book" {{ old('type', $publication->type) == 'book' ? 'selected' : '' }}>Book</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="doi" class="form-label fw-semibold">DOI</label>
                                <input type="text" class="form-control @error('doi') is-invalid @enderror" id="doi" name="doi" value="{{ old('doi', $publication->doi) }}" placeholder="10.1000/xyz123">
                                @error('doi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="url" class="form-label fw-semibold">URL</label>
                                <input type="url" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url', $publication->url ?? '') }}" placeholder="https://example.com">
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="volume" class="form-label fw-semibold">Volume</label>
                                <input type="text" class="form-control @error('volume') is-invalid @enderror" id="volume" name="volume" value="{{ old('volume', $publication->volume) }}" placeholder="Vol. 1">
                                @error('volume')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="pages" class="form-label fw-semibold">Halaman</label>
                                <input type="text" class="form-control @error('pages') is-invalid @enderror" id="pages" name="pages" value="{{ old('pages', $publication->pages) }}" placeholder="1-10">
                                @error('pages')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="isbn" class="form-label fw-semibold">ISBN</label>
                                <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn" value="{{ old('isbn', $publication->isbn) }}" placeholder="978-0-123456-78-9">
                                @error('isbn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="publisher" class="form-label fw-semibold">Penerbit</label>
                        <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher" value="{{ old('publisher', $publication->publisher) }}" placeholder="Nama penerbit">
                        @error('publisher')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.research.publications.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Publikasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection