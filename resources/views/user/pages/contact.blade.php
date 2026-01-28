@extends('user.main')

@section('title', 'Kontak - Lab HCI')

@section('styles')
<style>
    .faq-section {
        background-color: #f8f9fa;
    }
    
    .accordion-button {
        background-color: white;
        border: 1px solid #dee2e6;
        border-radius: 8px !important;
        margin-bottom: 1rem;
        font-weight: 500;
        color: #333;
    }
    
    .accordion-button:not(.collapsed) {
        background-color: #dc3545;
        color: white;
        border-color: #dc3545;
    }
    
    .accordion-button:focus {
        box-shadow: none;
        border-color: #dc3545;
    }
    
    .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M8 1a.5.5 0 0 1 .5.5v6h6a.5.5 0 0 1 0 1h-6v6a.5.5 0 0 1-1 0v-6h-6a.5.5 0 0 1 0-1h6v-6A.5.5 0 0 1 8 1z'/%3e%3c/svg%3e");
    }
    
    .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath fill-rule='evenodd' d='M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8z'/%3e%3c/svg%3e");
    }
    
    .accordion-item {
        border: none;
        margin-bottom: 1rem;
    }
    
    .accordion-body {
        background-color: white;
        border: 1px solid #dee2e6;
        border-top: none;
        border-radius: 0 0 8px 8px;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Kontak</h1>
                <p class="lead">Hubungi Lab HCI</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Kontak']]])

<div class="container section-padding">
    <div class="row g-5">
        <!-- Contact Information -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-5">
                    <h3 class="text-primary-custom mb-4">
                        <i class="fas fa-info-circle me-2"></i>Informasi Kontak
                    </h3>
                    
                    <!-- Head of Lab -->
                    <div class="mb-4">
                        <h5 class="text-primary-custom mb-3">
                            <i class="fas fa-user-tie me-2"></i>Kepala Laboratorium
                        </h5>
                        <div class="mb-3">
                            <h6>Mira Suryani, S.Pd., M.Kom</h6>
                            <p class="text-muted mb-0">Kepala Lab HCI</p>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="mb-4">
                        <h5 class="text-primary-custom mb-3">
                            <i class="fas fa-envelope me-2"></i>Email
                        </h5>
                        <p class="mb-2">
                            <i class="fas fa-envelope text-primary-custom me-2"></i>
                            <a href="mailto:lab.hci.unpad@gmail.com" class="text-decoration-none" style="color: #2c3e50;">lab.hci.unpad@gmail.com</a>
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-envelope text-primary-custom me-2"></i>
                            <a href="mailto:mira.suryani@unpad.ac.id" class="text-decoration-none" style="color: #2c3e50;">mira.suryani@unpad.ac.id</a>
                        </p>
                    </div>
                    
                    <!-- Address -->
                    <div class="mb-0">
                        <h5 class="text-primary-custom mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>Alamat
                        </h5>
                        <p class="mb-0">
                            <i class="fas fa-building text-primary-custom me-2"></i>
                            Laboratorium HCI Lt. 2 Gedung D, PPBS<br>
                            Kampus Unpad Jatinangor<br>
                            Jln. Ir. Soekarno km. 21<br>
                            Jatinangor, Kab. Sumedang 45363<br>
                            Jawa Barat, Indonesia
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Form -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-5">
                    <h3 class="text-primary-custom mb-4">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                    </h3>
                    
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phone" class="form-label">No. Telepon</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subjek</label>
                                <select class="form-select" id="subject" required>
                                    <option value="">Pilih Subjek</option>
                                    <option value="research">Kerjasama Riset</option>
                                    <option value="internship">Magang/Praktik Kerja</option>
                                    <option value="collaboration">Kerjasama Industri</option>
                                    <option value="reservation">Reservasi Lab</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                            
                            <div class="col-12">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Google Maps -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="text-primary-custom mb-4">
                        <i class="fas fa-map me-2"></i>Lokasi Lab HCI
                    </h3>
                    <div class="ratio ratio-21x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253491.24286943913!2d107.5234107457167!3d-6.914420070437234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c4ad96c5f5c3%3A0x95bcc57c3b5bff1!2sUniversitas%20Padjadjaran%2C%20Jl.%20Raya%20Jatinangor%2C%20Cikeruh%2C%20Kec.%20Jatinangor%2C%20Kabupaten%20Sumedang%2C%20Jawa%20Barat%2045363!5e0!3m2!1sid!2sid!4v1768880729093!5m2!1sid!2sid" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<section class="faq-section section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold mb-4">Frequently Asked Questions</h2>
                
                <div class="accordion" id="faqAccordion">
                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Apa itu Lab HCI?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lab HCI (Human-Computer Interaction) adalah pusat riset dan inovasi yang berfokus pada evaluasi sistem melalui pendekatan UI/UX, usability, serta pengembangan teknologi interaktif berbasis AR dan VR.
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Bagaimana cara bergabung dengan Lab HCI?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Mahasiswa Teknik Informatika Unpad dapat bergabung melalui program asisten praktikum atau penelitian. Cek halaman Karier untuk informasi posisi yang tersedia atau hubungi kami langsung.
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Layanan apa saja yang tersedia di Lab HCI?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Kami menyediakan praktikum HCI, sistem multimedia, podcast, perekaman video, pengembangan teknologi pembelajaran berbasis multimedia, dan layanan riset UI/UX.
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Apakah Lab HCI menerima kolaborasi eksternal?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, kami terbuka untuk kolaborasi dengan industri, institusi pendidikan, dan peneliti lain dalam bidang HCI, AR/VR, dan teknologi pembelajaran.
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                Bagaimana cara reservasi fasilitas lab?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Sistem reservasi lab sedang dalam pengembangan. Sementara ini, silakan hubungi kami melalui email untuk mengatur jadwal penggunaan fasilitas lab.
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                Topik penelitian apa yang dikembangkan di Lab HCI?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Kami fokus pada Adaptive User Interface, Augmented Reality, Learning Analytics, Learning Personalization, Usability Evaluation, UI/UX, Virtual Reality, dan Technology Enhanced Learning.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Illustration -->
            <div class="col-lg-6 text-center">
                <img src="{{ asset('assets/img/illustration/ilustration1.png') }}" alt="FAQ Illustration" class="img-fluid" style="max-height: 500px;">
            </div>
        </div>
    </div>
</section>
@endsection