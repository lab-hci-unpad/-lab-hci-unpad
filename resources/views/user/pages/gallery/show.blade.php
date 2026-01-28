@extends('user.main')

@section('title', $gallery->title . ' - Gallery Lab HCI')

@section('content')
<section class="hero-section-small" style="background: url('{{ asset('assets/img/hero/1.png') }}') center/cover no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">{{ $gallery->title }}</h1>
                <p class="lead">{{ $gallery->category == 'hci' ? 'Interaksi Manusia Komputer' : 'Proyek Perangkat Lunak I' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding non-hero-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row g-5">
                    <!-- Left: Image -->
                    <div class="col-lg-6">
                        <div class="sticky-top" style="top: 100px;">
                            @if($gallery->image)
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid rounded shadow-sm">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                                    <i class="fas fa-image text-muted" style="font-size: 4rem;"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Right: Content -->
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <span class="badge {{ $gallery->category == 'hci' ? 'bg-primary' : 'bg-success' }} mb-3">
                                {{ $gallery->category == 'hci' ? 'HCI' : 'PPL I' }}
                            </span>
                            <h2 class="fw-bold mb-3">{{ $gallery->title }}</h2>
                            <p class="lead text-muted">{{ $gallery->description }}</p>
                        </div>
                        
                        <!-- Project Info -->
                        <div class="card border-0 bg-light mb-4">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">Informasi Proyek</h6>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <small class="text-muted d-block">Semester</small>
                                        <strong>{{ $gallery->semester }}/{{ $gallery->year }}</strong>
                                    </div>
                                    @if($gallery->author)
                                    <div class="col-6">
                                        <small class="text-muted d-block">Pembuat</small>
                                        <strong>{{ $gallery->author }}</strong>
                                    </div>
                                    @endif
                                    @if($gallery->tech_stack)
                                    <div class="col-12">
                                        <small class="text-muted d-block">Teknologi</small>
                                        <strong>{{ $gallery->tech_stack }}</strong>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Deskripsi Lengkap</h6>
                            <div class="content">
                                {!! nl2br(e($gallery->content)) !!}
                            </div>
                        </div>
                        
                        <!-- Links -->
                        @if($gallery->demo_url || $gallery->github_url)
                        <div class="d-flex gap-3 mb-4">
                            @if($gallery->demo_url)
                                <a href="{{ $gallery->demo_url }}" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-external-link-alt me-2"></i>Demo
                                </a>
                            @endif
                            @if($gallery->github_url)
                                <a href="{{ $gallery->github_url }}" target="_blank" class="btn btn-outline-dark">
                                    <i class="fab fa-github me-2"></i>GitHub
                                </a>
                            @endif
                        </div>
                        @endif
                        
                        <!-- Back Button -->
                        <div class="mt-5">
                            <a href="{{ route('gallery') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Gallery
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
.content {
    line-height: 1.8;
}

@media (min-width: 992px) {
    .sticky-top {
        position: sticky !important;
        z-index: 10;
    }
}

/* Fix footer positioning */
footer {
    position: relative;
    z-index: 5;
}

/* Ensure navbar stays on top */
.navbar-custom {
    z-index: 1030 !important;
}

/* Fix main content positioning */
main {
    position: relative;
    z-index: 1;
}
</style>
@endsection