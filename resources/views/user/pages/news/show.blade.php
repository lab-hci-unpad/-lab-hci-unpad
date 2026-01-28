@extends('user.main')

@section('title', $news->title . ' - Lab HCI')

@section('content')
<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Berita</h1>
                <p class="lead">{{ $news->title }}</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Berita', 'url' => route('news')], ['title' => $news->title]]])

<div class="container section-padding">
    <!-- Featured Image -->
    <div class="row mb-5">
        <div class="col-12">
            <img src="{{ asset($news->featured_image) }}" alt="{{ $news->title }}" class="img-fluid w-100" style="height: 400px; object-fit: cover;">
        </div>
    </div>
    
    <!-- Content Layout -->
    <div class="row">
        <!-- Left Column - Content -->
        <div class="col-lg-8">
            <article>
                <header class="mb-4">
                    <h1 class="display-5 fw-bold mb-3">{{ $news->title }}</h1>
                    <div class="text-muted mb-3">
                        <i class="fas fa-calendar-alt me-2"></i>
                        {{ $news->published_at->format('d F Y') }}
                    </div>
                </header>
                
                <div class="content">
                    <p class="lead">{{ $news->excerpt }}</p>
                    <div class="mt-4">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </div>
            </article>
        </div>
        
        <!-- Right Column - Gallery -->
        <div class="col-lg-4">
            @if($news->gallery_images && count($news->gallery_images) > 0)
            <div class="sticky-top" style="top: 120px; z-index: 999;">
                <h5 class="text-primary-custom mb-3">
                    <i class="fas fa-images me-2"></i>Galeri Foto
                </h5>
                <div class="row g-2">
                    @foreach($news->gallery_images as $image)
                    <div class="col-6">
                        <img src="{{ asset($image) }}" alt="Gallery Image" class="img-fluid rounded shadow-sm" style="height: 120px; object-fit: cover; cursor: pointer;" onclick="showImageModal('{{ asset($image) }}')">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
    
    <!-- Back Button -->
    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('news') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Berita
            </a>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <img id="modalImage" src="" alt="Gallery Image" class="img-fluid w-100">
            </div>
        </div>
    </div>
</div>

<script>
function showImageModal(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    new bootstrap.Modal(document.getElementById('imageModal')).show();
}
</script>
@endsection