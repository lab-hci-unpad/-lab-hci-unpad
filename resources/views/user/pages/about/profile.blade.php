@extends('user.main')

@section('title', 'Profil Lab - Lab HCI')

@section('content')
<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Profil Lab HCI</h1>
                <p class="lead">Human-Computer Interaction Laboratory</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Tentang Kami', 'url' => '#'], ['title' => 'Profil Lab']]])

<div class="container section-padding">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h1 class="display-5 fw-bold mb-5">Profil Lab HCI</h1>
            
            <!-- Main Profile -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h3 class="mb-4">Human-Computer Interaction Laboratory</h3>
                            <p class="lead mb-4">Lab HCI (Human-Computer Interaction) merupakan pusat riset dan inovasi yang berfokus pada evaluasi sistem melalui pendekatan UI/UX, usability, serta pengembangan teknologi interaktif berbasis Augmented Reality (AR) dan Virtual Reality (VR).</p>
                            
                            <p class="mb-4">Sebelum berdiri secara resmi pada <strong>Februari 2024</strong>, riset-riset di Lab HCI sebelumnya tergabung dalam Lab RAID (Robotic, Artificial Intelligence, Digital Image), yang memiliki fokus pada pengembangan teknologi cerdas dan pemrosesan citra digital.</p>
                            
                            <p class="mb-0">Sebagai laboratorium yang mendukung pengembangan interaksi manusia dan teknologi, Lab HCI juga menyediakan berbagai layanan akademik dan industri, termasuk praktikum perkuliahan HCI, sistem multimedia, podcast, perekaman video, serta pengembangan teknologi pembelajaran berbasis multimedia. Dengan fasilitas dan keahlian yang tersedia, Lab HCI berkomitmen untuk mendorong inovasi di bidang interaksi manusia-komputer serta memberikan dampak positif bagi dunia pendidikan dan industri teknologi.</p>
                        </div>
                       
                    </div>
                </div>
            </div>
            
            <!-- Vision & Mission -->
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h4 class="text-primary-custom mb-3">
                                <i class="fas fa-eye me-2"></i>Visi
                            </h4>
                            <p class="mb-0">Menjadi pusat unggulan riset dan inovasi dalam bidang Human-Computer Interaction yang berkontribusi pada pengembangan teknologi interaktif untuk kemajuan pendidikan dan industri.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h4 class="text-primary-custom mb-3">
                                <i class="fas fa-bullseye me-2"></i>Misi
                            </h4>
                            <ul class="mb-0">
                                <li>Mengembangkan riset berkualitas di bidang HCI</li>
                                <li>Menyediakan layanan akademik dan industri</li>
                                <li>Mendorong inovasi teknologi interaktif</li>
                                <li>Memberikan dampak positif bagi masyarakat</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Services -->
            <div class="mb-5">
                <h3 class="mb-5 text-center">
                    <i class="fas fa-cogs text-primary-custom me-2"></i>Layanan Lab HCI
                </h3>
                
                <div class="row g-5">
                    @php
                    $services = [
                        ['icon' => 'fas fa-chalkboard-teacher', 'title' => 'Praktikum HCI', 'desc' => 'Praktikum perkuliahan Human-Computer Interaction'],
                        ['icon' => 'fas fa-video', 'title' => 'Sistem Multimedia', 'desc' => 'Pengembangan dan produksi konten multimedia'],
                        ['icon' => 'fas fa-podcast', 'title' => 'Podcast Production', 'desc' => 'Fasilitas perekaman dan produksi podcast'],
                        ['icon' => 'fas fa-camera', 'title' => 'Video Recording', 'desc' => 'Studio perekaman video profesional'],
                        ['icon' => 'fas fa-vr-cardboard', 'title' => 'AR/VR Development', 'desc' => 'Pengembangan aplikasi Augmented dan Virtual Reality'],
                        ['icon' => 'fas fa-laptop-code', 'title' => 'Technology Enhanced Learning', 'desc' => 'Pengembangan teknologi pembelajaran berbasis multimedia']
                    ];
                    @endphp
                    
                    @foreach($services as $service)
                    <div class="col-md-6 col-lg-4">
                        <div class="text-center py-4">
                            <i class="{{ $service['icon'] }} text-primary-custom mb-4" style="font-size: 3.5rem;"></i>
                            <h5 class="mb-3">{{ $service['title'] }}</h5>
                            <p class="text-muted mb-0">{{ $service['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- History -->
            <div class="mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex align-items-start">
                            <div class="me-4" style="border-left: 3px dotted #841818; padding-left: 20px; min-height: 200px;">
                                <div style="width: 10px; height: 10px; background-color: #841818; border-radius: 50%; margin-left: -26px; margin-top: 8px;"></div>
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="mb-4 text-primary-custom">Sejarah Lab HCI</h3>
                                
                                <p class="lead mb-4 text-justify">Lab HCI memiliki perjalanan yang menarik dalam perkembangan riset teknologi interaktif di Universitas Padjadjaran.</p>
                                
                                <p class="mb-4 text-justify">Pada <strong>Februari 2024</strong>, Lab HCI resmi berdiri sebagai laboratorium independen dengan fokus khusus pada Human-Computer Interaction. Pendirian ini menandai babak baru dalam pengembangan riset teknologi interaktif yang lebih terfokus dan terarah.</p>
                                
                                <p class="mb-0 text-justify">Sebelum berdiri secara mandiri, riset-riset yang kini menjadi fokus Lab HCI sebelumnya tergabung dalam Lab RAID (Robotic, Artificial Intelligence, Digital Image). Lab RAID memiliki fokus yang lebih luas pada pengembangan teknologi cerdas dan pemrosesan citra digital, yang kemudian menjadi fondasi kuat bagi pengembangan Lab HCI yang lebih spesialis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection