@extends('user.main')

@section('title', 'Gallery - Lab HCI')

@section('content')
<section class="hero-section-small" style="background: url('{{ asset('assets/img/hero/1.png') }}') center/cover no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold">Gallery</h1>
                <p class="lead">Produk Mahasiswa Lab HCI</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding non-hero-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto text-center mb-5">
                <h2 class="display-6 fw-bold mb-3">Karya Mahasiswa</h2>
                <p class="lead text-muted">Produk-produk dari mata kuliah Interaksi Manusia Komputer dan Proyek Perangkat Lunak I</p>
            </div>
        </div>
        
        <!-- Filter Tabs -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <ul class="nav nav-pills justify-content-center" id="galleryTabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('gallery') }}">Semua</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery', ['category' => 'hci']) }}">Interaksi Manusia Komputer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery', ['category' => 'ppl']) }}">Proyek Perangkat Lunak I</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Gallery Content -->
        <div class="row g-4">
            @forelse($projects as $project)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px; background-image: url('{{ $project->image ? asset('storage/' . $project->image) : '' }}'); background-size: cover; background-position: center;">
                        @if(!$project->image)
                            <i class="fas fa-image text-muted" style="font-size: 3rem;"></i>
                        @endif
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">{{ $project->title }}</h6>
                        <p class="card-text text-muted small">{{ Str::limit($project->description, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">{{ $project->semester }}/{{ $project->year }}</small>
                            <span class="badge {{ $project->category == 'hci' ? 'bg-primary' : 'bg-success' }}">
                                {{ $project->category == 'hci' ? 'HCI' : 'PPL I' }}
                            </span>
                        </div>
                        <a href="{{ route('gallery.show', $project->slug) }}" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="py-5">
                    <i class="fas fa-folder-open text-muted mb-3" style="font-size: 4rem;"></i>
                    <h5 class="text-muted">Belum ada proyek yang dipublikasikan</h5>
                    <p class="text-muted">Proyek mahasiswa akan ditampilkan di sini setelah dipublikasikan.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
.nav-pills .nav-link {
    color: #6c757d;
    border-radius: 25px;
    padding: 10px 20px;
    margin: 0 5px;
}

.nav-pills .nav-link.active {
    background-color: var(--primary-color);
    color: white;
}

.card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
}
</style>
@endsection