@extends('admin.main')

@section('title', 'Tambah Publikasi - Admin Lab HCI')
@section('page-title', 'Tambah Publikasi')

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.research.publications.index') }}">Publikasi</a></li>
        <li class="breadcrumb-item active">Tambah Publikasi</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Tambah Publikasi</h2>
                <p class="text-muted mb-0">Tambahkan publikasi penelitian Lab HCI</p>
            </div>
            <a href="{{ route('admin.research.publications.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Tambah Publikasi Baru</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.research.publications.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">Judul Publikasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Masukkan judul publikasi" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="authors" class="form-label fw-semibold">Penulis <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('authors') is-invalid @enderror" id="authors" name="authors" value="{{ old('authors') }}" placeholder="Nama penulis (pisahkan dengan koma)" required>
                        @error('authors')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="journal" class="form-label fw-semibold">Jurnal/Konferensi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('journal') is-invalid @enderror" id="journal" name="journal" value="{{ old('journal') }}" placeholder="Nama jurnal atau konferensi" required>
                                @error('journal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="year" class="form-label fw-semibold">Tahun <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', date('Y')) }}" min="2000" max="{{ date('Y') + 1 }}" required>
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
                            <option value="journal" {{ old('type') == 'journal' ? 'selected' : '' }}>Journal</option>
                            <option value="conference" {{ old('type') == 'conference' ? 'selected' : '' }}>Conference</option>
                            <option value="workshop" {{ old('type') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                            <option value="book" {{ old('type') == 'book' ? 'selected' : '' }}>Book</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="doi" class="form-label fw-semibold">DOI</label>
                                <input type="text" class="form-control @error('doi') is-invalid @enderror" id="doi" name="doi" value="{{ old('doi') }}" placeholder="10.1000/xyz123">
                                @error('doi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="url" class="form-label fw-semibold">URL</label>
                                <input type="url" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url') }}" placeholder="https://example.com">
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.research.publications.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Publikasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection