@extends('user.main')

@section('title', 'Karier - Lab HCI')

@section('content')
<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Peluang Karier</h1>
                <p class="lead">Bergabung dengan Tim Lab HCI</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Karier']]])

<div class="container section-padding">
    <div class="row">
        @forelse($jobPostings as $job)
        <!-- Job Posting with Left-Right Layout -->
        <div class="col-12 mb-5">
            <div class="row align-items-center">
                <!-- Left Side - Image -->
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="{{ asset('assets/img/karir/karier.png') }}" alt="Career at Lab HCI" class="img-fluid">
                </div>
                
                <!-- Right Side - Job Details -->
                <div class="col-lg-7">
                    <div class="ps-lg-4">
                        <!-- Job Header -->
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h2 class="mb-2">{{ $job->title }}</h2>
                                <p class="text-muted mb-0">Posisi Tersedia: {{ $job->quota }} Orang</p>
                            </div>
                            <span class="badge bg-success fs-6">
                                <i class="fas fa-circle me-1"></i>{{ ucfirst($job->status) }}
                            </span>
                        </div>
                        
                        @if($job->description)
                        <p class="text-muted mb-4">{{ $job->description }}</p>
                        @endif
                        
                        <!-- Qualifications -->
                        <div class="mb-4">
                            <h5 class="text-primary-custom mb-3">
                                <i class="fas fa-clipboard-list me-2"></i>Kualifikasi
                            </h5>
                            <ul class="list-unstyled">
                                @foreach($job->qualifications as $qualification)
                                <li class="mb-2">
                                    <i class="fas fa-check-circle text-primary-custom me-2"></i>
                                    {{ $qualification }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        @if($job->deadline)
                        <div class="alert alert-warning mb-4">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <strong>Deadline:</strong> {{ $job->deadline->format('d F Y') }}
                        </div>
                        @endif
                        
                        <!-- Action Buttons -->
                        <div class="d-flex gap-3">
                            <a href="{{ route('contact') }}" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Lamaran
                            </a>
                            <a href="mailto:lab.hci@unpad.ac.id" class="btn btn-outline-primary">
                                <i class="fas fa-envelope me-2"></i>Email Langsung
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- No Jobs Available -->
        <div class="col-12">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <img src="{{ asset('assets/img/karir/karir.jpeg') }}" alt="Career at Lab HCI" class="img-fluid">
                </div>
                <div class="col-lg-7">
                    <div class="ps-lg-4">
                        <i class="fas fa-briefcase text-muted mb-4" style="font-size: 3rem;"></i>
                        <h3 class="mb-3">Tidak Ada Lowongan Saat Ini</h3>
                        <p class="text-muted mb-4">
                            Saat ini tidak ada posisi yang tersedia. Silakan periksa kembali secara berkala atau hubungi kami untuk informasi lebih lanjut.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="{{ route('contact') }}" class="btn btn-primary">
                                <i class="fas fa-envelope me-2"></i>Hubungi Kami
                            </a>
                            <a href="{{ route('about.members') }}" class="btn btn-outline-primary">
                                <i class="fas fa-users me-2"></i>Tim Lab HCI
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforelse
        
        @if($jobPostings->count() > 0)
        <!-- Additional Info Section -->
        <div class="col-12 mt-5">
            <div class="card border-0 bg-light">
                <div class="card-body p-4">
                    <h5 class="text-primary-custom mb-3">
                        <i class="fas fa-info-circle me-2"></i>Mengapa Bergabung dengan Lab HCI?
                    </h5>
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="text-center">
                                <i class="fas fa-clock text-primary-custom mb-2" style="font-size: 2rem;"></i>
                                <h6>Fleksibilitas Waktu</h6>
                                <small class="text-muted">Jadwal kerja yang fleksibel</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <i class="fas fa-graduation-cap text-primary-custom mb-2" style="font-size: 2rem;"></i>
                                <h6>Skill Development</h6>
                                <small class="text-muted">Pengembangan kemampuan profesional</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <i class="fas fa-vr-cardboard text-primary-custom mb-2" style="font-size: 2rem;"></i>
                                <h6>Teknologi Terdepan</h6>
                                <small class="text-muted">Bekerja dengan AR/VR dan HCI</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <i class="fas fa-users text-primary-custom mb-2" style="font-size: 2rem;"></i>
                                <h6>Tim Profesional</h6>
                                <small class="text-muted">Lingkungan kerja yang mendukung</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection