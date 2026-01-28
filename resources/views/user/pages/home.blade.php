@extends('user.main')

@section('title', 'Lab HCI - Human Computer Interaction Laboratory')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Lab HCI</h1>
                <h2 class="h3 mb-4">Human-Computer Interaction Laboratory</h2>
                <p class="lead mb-4">Pusat riset dan inovasi yang berfokus pada evaluasi sistem melalui pendekatan UI/UX, usability, serta pengembangan teknologi interaktif berbasis Augmented Reality (AR) dan Virtual Reality (VR).</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('about.profile') }}" class="btn btn-light btn-lg">Tentang Kami</a>
                    <a href="{{ route('research.topics') }}" class="btn btn-outline-light btn-lg">Penelitian</a>
                </div>
            </div>
           
        </div>
    </div>
</section>

<!-- Reservation CTA Section -->
<section class="section-padding text-dark mt-5" style="background: url('{{ asset('assets/img/cta/bg-ctaa2.png') }}') center/cover no-repeat;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3 text-dark">Butuh Akses ke Fasilitas Lab HCI?</h3>
                <p class="mb-0 text-dark">Reservasi lab untuk kegiatan praktikum, riset, atau pengembangan proyek teknologi interaktif Anda</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('reservation') }}" class="btn btn-danger btn-lg text-white">
                    <i class="fas fa-calendar-alt me-2"></i>Reservasi Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Research Areas -->
<section class="section-padding bg-light non-hero-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-6 fw-bold mb-3">Area Penelitian</h2>
                <p class="lead text-muted">Fokus penelitian Lab HCI mencakup berbagai bidang teknologi interaktif</p>
            </div>
        </div>
        
        <div class="row g-4">
            @php
            $researchAreas = [
                ['icon' => 'fas fa-mobile-alt', 'title' => 'Adaptive User Interface', 'desc' => 'Pengembangan antarmuka yang dapat beradaptasi dengan kebutuhan pengguna'],
                ['icon' => 'fas fa-cube', 'title' => 'Augmented Reality', 'desc' => 'Teknologi AR untuk berbagai aplikasi pendidikan dan industri'],
                ['icon' => 'fas fa-chart-line', 'title' => 'Learning Analytics', 'desc' => 'Analisis data pembelajaran untuk meningkatkan efektivitas belajar'],
                ['icon' => 'fas fa-vr-cardboard', 'title' => 'Virtual Reality', 'desc' => 'Pengembangan aplikasi VR untuk simulasi dan pembelajaran'],
                ['icon' => 'fas fa-users', 'title' => 'User Experience', 'desc' => 'Evaluasi dan desain pengalaman pengguna yang optimal'],
                ['icon' => 'fas fa-graduation-cap', 'title' => 'Technology Enhanced Learning', 'desc' => 'Integrasi teknologi dalam proses pembelajaran']
            ];
            @endphp
            
            @foreach($researchAreas as $area)
            <div class="col-md-4 mb-4">
                <div class="text-center p-4">
                    <i class="{{ $area['icon'] }} text-primary-custom mb-3" style="font-size: 3rem;"></i>
                    <h5>{{ $area['title'] }}</h5>
                    <p class="text-muted">{{ $area['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Latest News -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-6 fw-bold mb-3">Berita Terbaru</h2>
                <p class="lead text-muted">Update terkini dari kegiatan Lab HCI</p>
            </div>
        </div>
        
        @foreach($latestNews as $index => $news)
        <div class="row align-items-center mb-5 {{ $index % 2 == 0 ? '' : 'flex-row-reverse' }}">
            <!-- Image Column -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset($news->featured_image) }}" alt="{{ $news->title }}" class="img-fluid rounded shadow" style="height: 300px; width: 100%; object-fit: cover;">
            </div>
            
            <!-- Content Column -->
            <div class="col-lg-6">
                <div class="{{ $index % 2 == 0 ? 'ps-lg-4' : 'pe-lg-4' }}">
                    <h4 class="mb-3">{{ $news->title }}</h4>
                    <p class="text-muted mb-3">{{ $news->excerpt }}</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-1"></i>
                            {{ $news->published_at->format('d F Y') }}
                        </small>
                        <a href="{{ route('news.show', $news->slug) }}" class="btn btn-outline-primary">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        <!-- View All News Button -->
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('news') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-newspaper me-2"></i>Lihat Semua Berita
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section section-padding text-dark mb-5" style="background: url('{{ asset('assets/img/cta/bg-cta.png') }}') center/cover no-repeat;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3 text-dark">Tertarik Bergabung dengan Lab HCI?</h3>
                <p class="mb-0 text-dark">Kami membuka kesempatan untuk mahasiswa yang ingin terlibat dalam riset HCI</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('career') }}" class="btn btn-danger btn-lg text-white">Lihat Peluang Karier</a>
            </div>
        </div>
    </div>
</section>
@endsection