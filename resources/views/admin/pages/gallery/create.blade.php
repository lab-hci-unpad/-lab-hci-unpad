@extends('admin.main')

@section('title', 'Tambah Gallery - Admin Lab HCI')
@section('page-title', 'Tambah Gallery')

@section('styles')
<style>
.form-section {
    background: #f8f9fa;
    border-left: 4px solid var(--primary-color);
    padding: 1rem;
    margin-bottom: 1.5rem;
    border-radius: 0 8px 8px 0;
}

.form-section h6 {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 0;
}

.image-preview {
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    padding: 2rem;
    text-align: center;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.image-preview:hover {
    border-color: var(--primary-color);
    background: rgba(132, 24, 24, 0.05);
}

.image-preview.dragover {
    border-color: var(--primary-color);
    background: rgba(132, 24, 24, 0.1);
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(132, 24, 24, 0.25);
}

.btn-group-toggle .btn {
    border-radius: 8px !important;
    margin: 0 0.25rem;
}

.progress-steps {
    display: flex;
    justify-content: space-between;
    margin-bottom: 2rem;
}

.step {
    flex: 1;
    text-align: center;
    position: relative;
}

.step::after {
    content: '';
    position: absolute;
    top: 15px;
    left: 50%;
    width: 100%;
    height: 2px;
    background: #dee2e6;
    z-index: -1;
}

.step:last-child::after {
    display: none;
}

.step-circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #dee2e6;
    color: #6c757d;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.step.active .step-circle {
    background: var(--primary-color);
    color: white;
}

.step.completed .step-circle {
    background: #28a745;
    color: white;
}
</style>
@endsection

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Gallery</a></li>
        <li class="breadcrumb-item active">Tambah Gallery</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-10 mx-auto">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Tambah Gallery Baru</h2>
                <p class="text-muted mb-0">Tambahkan project mahasiswa ke dalam gallery Lab HCI</p>
            </div>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <!-- Progress Steps -->
        <div class="progress-steps">
            <div class="step active">
                <div class="step-circle">1</div>
                <small>Info Dasar</small>
            </div>
            <div class="step">
                <div class="step-circle">2</div>
                <small>Detail Project</small>
            </div>
            <div class="step">
                <div class="step-circle">3</div>
                <small>Media & Links</small>
            </div>
            <div class="step">
                <div class="step-circle">4</div>
                <small>Publikasi</small>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" id="galleryForm">
            @csrf
            
            <!-- Basic Information -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-section">
                        <h6><i class="fas fa-info-circle me-2"></i>Informasi Dasar</h6>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Judul Project <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Masukkan judul project" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="category" class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="hci" {{ old('category') == 'hci' ? 'selected' : '' }}>Interaksi Manusia Komputer</option>
                                    <option value="ppl" {{ old('category') == 'ppl' ? 'selected' : '' }}>Proyek Perangkat Lunak</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Deskripsi Singkat <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Jelaskan project dalam 2-3 kalimat" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-semibold">Deskripsi Lengkap <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" placeholder="Jelaskan project secara detail, fitur-fitur, dan teknologi yang digunakan" required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Project Details -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-section">
                        <h6><i class="fas fa-cogs me-2"></i>Detail Project</h6>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="author" class="form-label fw-semibold">Nama Pembuat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}" placeholder="Nama mahasiswa" required>
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="semester" class="form-label fw-semibold">Semester <span class="text-danger">*</span></label>
                                <select class="form-select @error('semester') is-invalid @enderror" id="semester" name="semester" required>
                                    <option value="">Pilih Semester</option>
                                    @for($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                                    @endfor
                                </select>
                                @error('semester')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="year" class="form-label fw-semibold">Tahun <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', date('Y')) }}" min="2020" max="{{ date('Y') + 1 }}" required>
                                @error('year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tech_stack" class="form-label fw-semibold">Technology Stack</label>
                        <input type="text" class="form-control @error('tech_stack') is-invalid @enderror" id="tech_stack" name="tech_stack" value="{{ old('tech_stack') }}" placeholder="Laravel, Vue.js, MySQL, Bootstrap">
                        <small class="text-muted">Pisahkan dengan koma untuk multiple teknologi</small>
                        @error('tech_stack')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Media & Links -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-section">
                        <h6><i class="fas fa-image me-2"></i>Media & Links</h6>
                    </div>
                    
                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold">Screenshot/Gambar Project</label>
                        <div class="image-preview" id="imagePreview">
                            <i class="fas fa-cloud-upload-alt text-muted mb-2" style="font-size: 2rem;"></i>
                            <p class="text-muted mb-2">Drag & drop gambar atau klik untuk browse</p>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" style="display: none;">
                            <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('image').click()">
                                <i class="fas fa-folder-open me-2"></i>Pilih Gambar
                            </button>
                            <small class="d-block text-muted mt-2">Format: JPG, PNG, GIF (Max: 2MB)</small>
                        </div>
                        @error('image')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="demo_url" class="form-label fw-semibold">Demo URL</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-external-link-alt"></i></span>
                                    <input type="url" class="form-control @error('demo_url') is-invalid @enderror" id="demo_url" name="demo_url" value="{{ old('demo_url') }}" placeholder="https://demo.example.com">
                                </div>
                                @error('demo_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="github_url" class="form-label fw-semibold">GitHub Repository</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fab fa-github"></i></span>
                                    <input type="url" class="form-control @error('github_url') is-invalid @enderror" id="github_url" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/username/repo">
                                </div>
                                @error('github_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Publication Settings -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-section">
                        <h6><i class="fas fa-eye me-2"></i>Pengaturan Publikasi</h6>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="is_published">
                                    <i class="fas fa-globe me-2"></i>Publikasikan ke Website
                                </label>
                                <small class="d-block text-muted">Project akan tampil di halaman gallery publik</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="is_featured">
                                    <i class="fas fa-star me-2"></i>Jadikan Featured
                                </label>
                                <small class="d-block text-muted">Project akan ditampilkan di bagian unggulan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <div>
                            <button type="button" class="btn btn-outline-primary me-2" onclick="saveDraft()">
                                <i class="fas fa-save me-2"></i>Simpan Draft
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check me-2"></i>Simpan Gallery
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Image preview functionality
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = `
                <img src="${e.target.result}" class="img-fluid rounded mb-2" style="max-height: 200px;">
                <p class="text-success mb-2"><i class="fas fa-check-circle me-1"></i>Gambar berhasil dipilih</p>
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeImage()">
                    <i class="fas fa-trash me-1"></i>Hapus
                </button>
            `;
        };
        reader.readAsDataURL(file);
    }
});

function removeImage() {
    document.getElementById('image').value = '';
    document.getElementById('imagePreview').innerHTML = `
        <i class="fas fa-cloud-upload-alt text-muted mb-2" style="font-size: 2rem;"></i>
        <p class="text-muted mb-2">Drag & drop gambar atau klik untuk browse</p>
        <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('image').click()">
            <i class="fas fa-folder-open me-2"></i>Pilih Gambar
        </button>
        <small class="d-block text-muted mt-2">Format: JPG, PNG, GIF (Max: 2MB)</small>
    `;
}

// Drag and drop functionality
const imagePreview = document.getElementById('imagePreview');

imagePreview.addEventListener('dragover', function(e) {
    e.preventDefault();
    this.classList.add('dragover');
});

imagePreview.addEventListener('dragleave', function(e) {
    e.preventDefault();
    this.classList.remove('dragover');
});

imagePreview.addEventListener('drop', function(e) {
    e.preventDefault();
    this.classList.remove('dragover');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        document.getElementById('image').files = files;
        document.getElementById('image').dispatchEvent(new Event('change'));
    }
});

// Save draft functionality
function saveDraft() {
    const form = document.getElementById('galleryForm');
    const publishedCheckbox = document.getElementById('is_published');
    publishedCheckbox.checked = false;
    form.submit();
}

// Form validation
document.getElementById('galleryForm').addEventListener('submit', function(e) {
    const requiredFields = ['title', 'description', 'content', 'category', 'author', 'semester', 'year'];
    let isValid = true;
    
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });
    
    if (!isValid) {
        e.preventDefault();
        alert('Mohon lengkapi semua field yang wajib diisi!');
    }
});
</script>
@endsectionion