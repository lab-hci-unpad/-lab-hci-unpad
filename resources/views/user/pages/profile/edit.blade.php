@extends('user.main')

@section('title', 'Edit Profile - Lab HCI')

@section('content')
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-3">Edit Profile</h1>
                <p class="lead">Lengkapi informasi pribadi dan akademik Anda</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding non-hero-page">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="avatar-large mb-3">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <h5 class="card-title">{{ Auth::user()->name }}</h5>
                        <p class="text-muted">{{ Auth::user()->role == 'mahasiswa' ? 'Mahasiswa' : ucfirst(Auth::user()->role) }}</p>
                        @if(Auth::user()->nim)
                            <p class="text-muted mb-0">NIM: {{ Auth::user()->nim }}</p>
                        @endif
                        @if(Auth::user()->major)
                            <p class="text-muted mb-0">{{ Auth::user()->major }}</p>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 p-4">
                        <h5 class="mb-0">Edit Informasi Pribadi</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" value="{{ Auth::user()->nim }}">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control" id="address" name="address" rows="3">{{ Auth::user()->address }}</textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="faculty" class="form-label">Fakultas</label>
                                    <select class="form-select" id="faculty" name="faculty">
                                        <option value="">Pilih Fakultas</option>
                                        <option value="FMIPA" {{ Auth::user()->faculty == 'FMIPA' ? 'selected' : '' }}>FMIPA</option>
                                        <option value="FEB" {{ Auth::user()->faculty == 'FEB' ? 'selected' : '' }}>FEB</option>
                                        <option value="FHUKUM" {{ Auth::user()->faculty == 'FHUKUM' ? 'selected' : '' }}>FHUKUM</option>
                                        <option value="FISIP" {{ Auth::user()->faculty == 'FISIP' ? 'selected' : '' }}>FISIP</option>
                                        <option value="FKG" {{ Auth::user()->faculty == 'FKG' ? 'selected' : '' }}>FKG</option>
                                        <option value="FKEP" {{ Auth::user()->faculty == 'FKEP' ? 'selected' : '' }}>FKEP</option>
                                        <option value="FPIK" {{ Auth::user()->faculty == 'FPIK' ? 'selected' : '' }}>FPIK</option>
                                        <option value="FPP" {{ Auth::user()->faculty == 'FPP' ? 'selected' : '' }}>FPP</option>
                                        <option value="FPTK" {{ Auth::user()->faculty == 'FPTK' ? 'selected' : '' }}>FPTK</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="major" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" id="major" name="major" value="{{ Auth::user()->major }}" placeholder="Contoh: Teknik Informatika">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select class="form-select" id="semester" name="semester">
                                        <option value="">Pilih Semester</option>
                                        @for($i = 1; $i <= 14; $i++)
                                            <option value="{{ $i }}" {{ Auth::user()->semester == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                                </button>
                                <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
.avatar-large {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background-color: var(--primary-color);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 24px;
    margin: 0 auto;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(132, 24, 24, 0.15);
}
</style>
@endsection