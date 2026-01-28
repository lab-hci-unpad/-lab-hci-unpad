@extends('user.main')

@section('title', 'Reservasi Lab - Lab HCI')

@section('content')
<!-- Hero Section -->
<section class="hero-section-small" style="background: url('{{ asset('assets/img/hero/1.png') }}') center/cover no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Reservasi Lab</h1>
                <p class="lead">Booking Fasilitas Lab HCI</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Reservasi Lab']]])

<div class="container section-padding">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <i class="fas fa-calendar-alt text-primary-custom mb-4" style="font-size: 5rem;"></i>
                    <h3 class="mb-3">Sistem Reservasi</h3>
                    <p class="text-muted mb-4">Sistem reservasi laboratorium HCI sedang dalam tahap pengembangan lanjutan. Fitur ini akan memungkinkan pengguna untuk melakukan booking ruang lab, peralatan, dan jadwal kegiatan secara online.</p>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Untuk sementara, silakan hubungi admin lab melalui email atau datang langsung ke laboratorium untuk melakukan reservasi.
                    </div>
                    
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-primary">Hubungi Admin</a>
                        <a href="{{ route('about.facilities') }}" class="btn btn-outline-primary">Lihat Fasilitas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection