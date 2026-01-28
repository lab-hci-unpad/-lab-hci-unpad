@extends('user.main')

@section('title', 'Berita - Lab HCI')

@section('content')
<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Berita</h1>
                <p class="lead">Informasi & Kegiatan Lab HCI</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Berita']]])

<div class="container section-padding">
    <div class="row">
        @forelse($news as $item)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <img src="{{ asset($item->featured_image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text text-muted flex-grow-1">{{ $item->excerpt }}</p>
                    <div class="mt-auto">
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-1"></i>
                            {{ $item->published_at->format('d F Y') }}
                        </small>
                        <div class="mt-3">
                            <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary">
                                <i class="fas fa-eye me-2"></i>Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-newspaper text-muted mb-3" style="font-size: 4rem;"></i>
                <h4>Belum Ada Berita</h4>
                <p class="text-muted">Berita akan segera hadir di halaman ini.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection