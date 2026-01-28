@extends('user.main')

@section('title', 'Profile Saya - Lab HCI')

@section('content')
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-3">Profile Saya</h1>
                <p class="lead">Informasi pribadi dan akademik Anda</p>
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
                        <div class="mt-3">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit me-2"></i>Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 p-4">
                        <h5 class="mb-0">Informasi Pribadi</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Nama Lengkap:</strong></div>
                            <div class="col-md-9">{{ Auth::user()->name ?: '-' }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>NIM:</strong></div>
                            <div class="col-md-9">{{ Auth::user()->nim ?: '-' }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Email:</strong></div>
                            <div class="col-md-9">{{ Auth::user()->email ?: '-' }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>No. Telepon:</strong></div>
                            <div class="col-md-9">{{ Auth::user()->phone ?: '-' }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Alamat:</strong></div>
                            <div class="col-md-9">{{ Auth::user()->address ?: '-' }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Fakultas:</strong></div>
                            <div class="col-md-9">{{ Auth::user()->faculty ?: '-' }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Program Studi:</strong></div>
                            <div class="col-md-9">{{ Auth::user()->major ?: '-' }}</div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3"><strong>Semester:</strong></div>
                            <div class="col-md-9">{{ Auth::user()->semester ? 'Semester ' . Auth::user()->semester : '-' }}</div>
                        </div>
                        
                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                                <i class="fas fa-edit me-2"></i>Edit Profile
                            </a>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
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

.row.mb-3 {
    padding: 8px 0;
    border-bottom: 1px solid #f8f9fa;
}

.row.mb-3:last-child {
    border-bottom: none;
}
</style>
@endsection