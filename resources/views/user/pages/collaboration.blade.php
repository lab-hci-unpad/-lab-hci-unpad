@extends('user.main')

@section('title', 'Kerja Sama - Lab HCI')

@section('content')
<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Kerja Sama</h1>
                <p class="lead">Kemitraan Strategis Lab HCI</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Kerja Sama']]])

<div class="container section-padding">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5 text-center">
                    <i class="fas fa-handshake text-primary-custom mb-4" style="font-size: 5rem;"></i>
                    <h3 class="mb-3">Kemitraan Strategis</h3>
                    <p class="text-muted mb-4">Lab HCI terbuka untuk menjalin kerjasama dengan berbagai pihak dalam pengembangan riset, teknologi, dan inovasi di bidang Human-Computer Interaction.</p>
                    
                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <div class="p-3">
                                <i class="fas fa-university text-primary-custom mb-2" style="font-size: 2rem;"></i>
                                <h6>Institusi Akademik</h6>
                                <small class="text-muted">Kerjasama riset dan pertukaran pengetahuan</small>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="p-3">
                                <i class="fas fa-industry text-primary-custom mb-2" style="font-size: 2rem;"></i>
                                <h6>Industri</h6>
                                <small class="text-muted">Hilirisasi riset dan pengembangan produk</small>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="p-3">
                                <i class="fas fa-building text-primary-custom mb-2" style="font-size: 2rem;"></i>
                                <h6>Pemerintah</h6>
                                <small class="text-muted">Program pengabdian masyarakat</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Konten kerjasama akan segera ditambahkan dengan informasi lengkap mengenai mitra dan program kolaborasi Lab HCI.
                    </div>
                    
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Hubungi Kami untuk Kerjasama</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection