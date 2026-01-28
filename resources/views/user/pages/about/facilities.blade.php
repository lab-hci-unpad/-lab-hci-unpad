@extends('user.main')

@section('title', 'Fasilitas - Lab HCI')

@section('content')
<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Fasilitas</h1>
                <p class="lead">Infrastruktur Lab HCI</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Tentang Kami', 'url' => '#'], ['title' => 'Fasilitas']]])

<div class="container section-padding">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Main Facilities -->
            <div class="mb-5" style="background: url('{{ asset('assets/img/cta/bg-ctaa2.png') }}'); background-size: contain; background-repeat: no-repeat; background-position: center; border-radius: 10px; height: 400px; width: 100%; display: flex; align-items: center;">
                <div class="p-5" style="color: #2c3e50; width: 100%;">
                    <h3 class="mb-4" style="color: #2c3e50;"><i class="fas fa-building me-2"></i>Infrastruktur Laboratorium</h3>
                    <p class="lead mb-4" style="color: #2c3e50;">Lab HCI dilengkapi dengan fasilitas modern untuk mendukung riset dan pengembangan teknologi interaktif.</p>
                    
                    <div class="alert" style="background-color: rgba(44, 62, 80, 0.1); border: 1px solid rgba(44, 62, 80, 0.2); color: #2c3e50;">
                        <i class="fas fa-info-circle me-2"></i>
                        Informasi lengkap fasilitas dapat dilihat di: 
                        <a href="https://docs.google.com/presentation/d/1rdwpkgm0x-B84ZhTu4k95gkBGfIqiiZ9cptFLet5mw8/edit?usp=sharing" target="_blank" style="color: #841818; text-decoration: underline;">
                            Google Slides Fasilitas Lab HCI
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Equipment Categories -->
            <div class="row g-5 mb-5">
                @php
                $facilities = [
                    ['icon' => 'fas fa-vr-cardboard', 'title' => 'VR Equipment', 'desc' => 'Perangkat Virtual Reality untuk pengembangan aplikasi immersive'],
                    ['icon' => 'fas fa-mobile-alt', 'title' => 'AR Devices', 'desc' => 'Perangkat Augmented Reality untuk pengembangan aplikasi AR'],
                    ['icon' => 'fas fa-video', 'title' => 'Studio Recording', 'desc' => 'Studio perekaman video dan audio profesional'],
                    ['icon' => 'fas fa-desktop', 'title' => 'Computing Lab', 'desc' => 'Laboratorium komputer dengan spesifikasi tinggi'],
                    ['icon' => 'fas fa-microphone', 'title' => 'Podcast Studio', 'desc' => 'Studio podcast dengan peralatan recording berkualitas'],
                    ['icon' => 'fas fa-tools', 'title' => 'Development Tools', 'desc' => 'Software dan tools untuk pengembangan aplikasi HCI']
                ];
                @endphp
                
                @foreach($facilities as $facility)
                <div class="col-md-6 col-lg-4">
                    <div class="text-center py-4">
                        <i class="{{ $facility['icon'] }} text-primary-custom mb-4" style="font-size: 3.5rem;"></i>
                        <h5 class="mb-3">{{ $facility['title'] }}</h5>
                        <p class="text-muted mb-0">{{ $facility['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Lab Spaces -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="fas fa-map-marker-alt text-primary-custom me-2"></i>Ruang Laboratorium</h3>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-flask text-primary-custom me-3 mt-1" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-1">Lab Utama HCI</h6>
                                    <small class="text-muted">Ruang utama untuk praktikum dan riset HCI dengan kapasitas 30 mahasiswa</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-video text-primary-custom me-3 mt-1" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-1">Studio Multimedia</h6>
                                    <small class="text-muted">Studio perekaman video dan podcast dengan peralatan profesional</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-cube text-primary-custom me-3 mt-1" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-1">AR/VR Testing Room</h6>
                                    <small class="text-muted">Ruang khusus untuk testing dan pengembangan aplikasi AR/VR</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-users text-primary-custom me-3 mt-1" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-1">Meeting Room</h6>
                                    <small class="text-muted">Ruang diskusi dan presentasi untuk kegiatan riset</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection