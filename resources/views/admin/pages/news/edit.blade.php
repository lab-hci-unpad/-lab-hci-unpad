@extends('admin.main')

@section('title', 'Edit Berita - Admin Lab HCI')
@section('page-title', 'Edit Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Kelola Berita</a></li>
                <li class="breadcrumb-item active">Edit Berita</li>
            </ol>
        </nav>
        <h2 class="mb-0">Edit Berita</h2>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('news.show', $news->slug) }}" target="_blank" class="btn btn-outline-info">
            <i class="fas fa-eye me-2"></i>Lihat
        </a>
        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

<form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Berita</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $news->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Ringkasan <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3" required>{{ old('excerpt', $news->excerpt) }}</textarea>
                        <div class="form-text">Ringkasan singkat yang akan ditampilkan di halaman utama</div>
                        @error('excerpt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Konten Berita <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content', $news->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Media</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Featured Image</label>
                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" accept="image/*">
                        <div class="form-text">Kosongkan jika tidak ingin mengubah gambar utama</div>
                        @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        @if($news->featured_image)
                        <div class="mt-3">
                            <p class="mb-2"><strong>Gambar Saat Ini:</strong></p>
                            <img src="{{ asset($news->featured_image) }}" alt="Current featured image" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="gallery_images" class="form-label">Gallery Images</label>
                        <input type="file" class="form-control @error('gallery_images.*') is-invalid @enderror" id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
                        <div class="form-text">Kosongkan jika tidak ingin mengubah gallery images</div>
                        @error('gallery_images.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        @if($news->gallery_images && count($news->gallery_images) > 0)
                        <div class="mt-3">
                            <p class="mb-2"><strong>Gallery Saat Ini:</strong></p>
                            <div class="row g-2">
                                @foreach($news->gallery_images as $image)
                                <div class="col-md-3">
                                    <img src="{{ asset($image) }}" alt="Gallery image" class="img-thumbnail w-100" style="height: 100px; object-fit: cover;">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Pengaturan Publikasi</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="draft" {{ old('status', $news->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $news->status) == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="published_at" class="form-label">Tanggal Publish <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at', $news->published_at->format('Y-m-d\TH:i')) }}" required>
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Informasi</h5>
                </div>
                <div class="card-body">
                    <small class="text-muted">
                        <strong>Dibuat:</strong> {{ $news->created_at->format('d M Y H:i') }}<br>
                        <strong>Diupdate:</strong> {{ $news->updated_at->format('d M Y H:i') }}<br>
                        <strong>Slug:</strong> {{ $news->slug }}
                    </small>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Aksi</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Berita
                        </button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <hr>
                        <button type="button" class="btn btn-outline-danger w-100" onclick="deleteNews()">
                            <i class="fas fa-trash me-2"></i>Hapus Berita
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Hidden Delete Form -->
<form id="deleteForm" method="POST" action="{{ route('admin.news.destroy', $news) }}" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@section('scripts')
<script>
function deleteNews() {
    if (confirm('Yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.')) {
        document.getElementById('deleteForm').submit();
    }
}
</script>