@extends('admin.main')

@section('title', 'Tambah Job Posting - Admin Lab HCI')
@section('page-title', 'Tambah Job Posting')

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.jobs.index') }}">Job Postings</a></li>
        <li class="breadcrumb-item active">Tambah Job</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Tambah Job Posting</h2>
                <p class="text-muted mb-0">Tambahkan lowongan kerja baru Lab HCI</p>
            </div>
            <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Tambah Job Posting Baru</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.jobs.store') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">Judul Posisi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Masukkan judul posisi" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Deskripsi Pekerjaan <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Jelaskan deskripsi pekerjaan secara detail" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="quota" class="form-label fw-semibold">Kuota <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('quota') is-invalid @enderror" id="quota" name="quota" value="{{ old('quota', 1) }}" min="1" required>
                                @error('quota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deadline" class="form-label fw-semibold">Deadline</label>
                        <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline') }}">
                        <small class="text-muted">Kosongkan jika tidak ada deadline</small>
                        @error('deadline')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kualifikasi <span class="text-danger">*</span></label>
                        <div id="qualifications-container">
                            @if(old('qualifications'))
                                @foreach(old('qualifications') as $index => $qualification)
                                <div class="qualification-item mb-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('qualifications.'.$index) is-invalid @enderror" name="qualifications[]" value="{{ $qualification }}" placeholder="Masukkan kualifikasi" required>
                                        <button type="button" class="btn btn-outline-danger" onclick="removeQualification(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    @error('qualifications.'.$index)
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endforeach
                            @else
                                <div class="qualification-item mb-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="qualifications[]" placeholder="Masukkan kualifikasi" required>
                                        <button type="button" class="btn btn-outline-danger" onclick="removeQualification(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="addQualification()">
                            <i class="fas fa-plus me-1"></i>Tambah Kualifikasi
                        </button>
                        @error('qualifications')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Job
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function addQualification() {
    const container = document.getElementById('qualifications-container');
    const newItem = document.createElement('div');
    newItem.className = 'qualification-item mb-2';
    newItem.innerHTML = `
        <div class="input-group">
            <input type="text" class="form-control" name="qualifications[]" placeholder="Masukkan kualifikasi" required>
            <button type="button" class="btn btn-outline-danger" onclick="removeQualification(this)">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `;
    container.appendChild(newItem);
}

function removeQualification(button) {
    const container = document.getElementById('qualifications-container');
    if (container.children.length > 1) {
        button.closest('.qualification-item').remove();
    } else {
        alert('Minimal harus ada satu kualifikasi');
    }
}
</script>
@endsection