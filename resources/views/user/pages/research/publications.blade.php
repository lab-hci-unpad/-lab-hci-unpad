@extends('user.main')

@section('title', 'Publikasi - Lab HCI')

@section('content')

@php
$copyrights = [
    ['title' => 'Aplikasi AMADI – Visualisasi Naskah', 'year' => '2018', 'type' => 'Program Komputer', 'number' => '000117872'],
    ['title' => 'Protokol Penggunaan Mobile-Assisted Virtual Reality untuk Terapi Ketakutan Terhadap Gelap', 'year' => '2018', 'type' => 'Program Komputer', 'number' => '000124154'],
    ['title' => 'Aplikasi Mobile-Assisted Virtual Reality untuk Terapi Ketakutan Terhadap Gelap', 'year' => '2018', 'type' => 'Program Komputer', 'number' => '000128636'],
    ['title' => 'Aplikasi Mobile Curhat ASI', 'year' => '2019', 'type' => 'Program Komputer', 'number' => '000132531'],
    ['title' => 'Digital Learning Content (DiLCo) Repository', 'year' => '2019', 'type' => 'Program Komputer', 'number' => '000133961'],
    ['title' => 'Film Wawancara Eksklusif Akademisi Dinas Pariwisata dan Masyarakat Adat Terkait Situs Bersejarah Kabuyutan Ciburuy', 'year' => '2019', 'type' => 'Karya Rekaman Video', 'number' => '000141018'],
    ['title' => 'Aplikasi Mandala Naskah', 'year' => '2019', 'type' => 'Program Komputer', 'number' => '000148537'],
    ['title' => 'Video Pembelajaran Bahasa Inggris - Passive Voice', 'year' => '2020', 'type' => 'Karya Siaran Video', 'number' => '000182845'],
    ['title' => 'Video Pembelajaran Pendidikan Agama Islam Perkembangan Islam Pada Masa Modern', 'year' => '2020', 'type' => 'Karya Siaran Video', 'number' => '000182844'],
    ['title' => 'Proses Segmentasi dan Anotasi Semi Otomatis pada Digitalisasi Manuskrip Lontar Sunda', 'year' => '2020', 'type' => 'Modul', 'number' => '000192095'],
    ['title' => 'Aplikasi Augemented Reality (AR) Aksara Sunda Kuno', 'year' => '2020', 'type' => 'Program Komputer', 'number' => '000182846'],
    ['title' => 'Foto Koleksi Lontar di Situs Kabuyutan Ciburuy', 'year' => '2021', 'type' => 'Karya Cipta Lainnya', 'number' => '000242610'],
    ['title' => 'SMARTFit Indonesia Versi 1.0', 'year' => '2021', 'type' => 'Program Komputer', 'number' => '000237536'],
    ['title' => 'ARKADA (AR Aksara Sunda)', 'year' => '2023', 'type' => 'Program Komputer', 'number' => '000448785'],
    ['title' => 'Virtual Reality Kasus Sederhana Ekstraksi Gigi pada Dewasa', 'year' => '2023', 'type' => 'Program Komputer', 'number' => '000455535'],
    ['title' => 'Platform UMKM Sumedang-Unpad Go Digital', 'year' => '2023', 'type' => 'Program Komputer', 'number' => '000455536'],
    ['title' => 'AYAScanner : Program Komputer Desktop Pemantau Kehadiran Dosen Departemen Ilmu Komputer Menggunakan QR-Code', 'year' => '2023', 'type' => 'Program Komputer', 'number' => '000448787'],
    ['title' => 'DENTS_AR', 'year' => '2023', 'type' => 'Program Komputer', 'number' => '000507537'],
    ['title' => 'Video Tutorial DENTS_AR', 'year' => '2023', 'type' => 'Karya Siaran Video', 'number' => '000520006'],
    ['title' => 'Alat Ukur Persepsi Visual Penggunaan VRDH pada Penderita Dental Anxiety', 'year' => '2024', 'type' => 'Karya Tulis Lainnya', 'number' => '000627560'],
    ['title' => 'AdaptiXLearn', 'year' => '2025', 'type' => 'Program Komputer', 'number' => '000927318'],
    ['title' => 'Afirmasi Anjani', 'year' => '2025', 'type' => 'Karya Rekaman Video', 'number' => '000924973'],
    ['title' => 'Afirmasi Abimaya', 'year' => '2026', 'type' => 'Karya Rekaman Video', 'number' => '001074799'],
    ['title' => 'Augmented Reality Activity Book Perjalanan Gigi Berlubang dan Pencegahannya', 'year' => '2026', 'type' => 'Buku', 'number' => '001075950'],
    ['title' => 'Aplikasi Komputer untuk Hoax Detection', 'year' => '2026', 'type' => 'Program Komputer', 'number' => '001146200'],
    ['title' => 'Framework Co-working Space: Pengembangan Fitur Sistem Informasi KBIHU untuk Meningkatkan Pelayanan dan Pengetahuan Jemaah Haji dan Umrah Secara Online', 'year' => '2026', 'type' => 'Program Komputer', 'number' => '001146159']
];
@endphp

<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Publikasi</h1>
                <p class="lead">Karya Ilmiah & Penelitian Lab HCI</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Research', 'url' => '#'], ['title' => 'Publikasi']]])

<div class="container section-padding">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h1 class="display-5 fw-bold mb-5">Publikasi Lab HCI</h1>
            
            <!-- Publications Overview -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center position-relative overflow-hidden" style="background-image: url('{{ asset('assets/img/card/card1.png') }}'); background-size: cover; background-position: center; min-height: 200px;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-light opacity-75"></div>
                        <div class="card-body p-4 position-relative text-dark">
                            <i class="fas fa-journal-whills text-primary-custom mb-3" style="font-size: 3rem;"></i>
                            <h4>{{ $journalCount + $conferenceCount }}+</h4>
                            <p class="mb-0">Jurnal & Konferensi</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center position-relative overflow-hidden" style="background-image: url('{{ asset('assets/img/card/card1.png') }}'); background-size: cover; background-position: center; min-height: 200px;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-light opacity-75"></div>
                        <div class="card-body p-4 position-relative text-dark">
                            <i class="fas fa-book text-primary-custom mb-3" style="font-size: 3rem;"></i>
                            <h4>{{ $bookCount }}</h4>
                            <p class="mb-0">Buku</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center position-relative overflow-hidden" style="background-image: url('{{ asset('assets/img/card/card1.png') }}'); background-size: cover; background-position: center; min-height: 200px;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-light opacity-75"></div>
                        <div class="card-body p-4 position-relative text-dark">
                            <i class="fas fa-copyright text-primary-custom mb-3" style="font-size: 3rem;"></i>
                            <h4>{{ count($copyrights) }}</h4>
                            <p class="mb-0">Hak Cipta</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Journals & Conferences -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="fas fa-newspaper text-primary-custom me-2"></i>Jurnal dan Konferensi</h3>
                    
                    @foreach($publications->where('type', '!=', 'book')->groupBy('year') as $year => $yearPublications)
                    <div class="mb-4">
                        <h5 class="text-primary-custom mb-3">{{ $year }}</h5>
                        @foreach($yearPublications as $publication)
                        <div class="publication-item mb-3 p-3 bg-light rounded">
                            <p class="mb-1">
                                <strong>{{ $publication->authors }}.</strong> 
                                {{ $publication->title }}. 
                                <em>{{ $publication->venue }}</em>. 
                                @if($publication->volume) Vol {{ $publication->volume }}. @endif
                                @if($publication->pages) pp. {{ $publication->pages }}. @endif
                                {{ $publication->year }}.
                                @if($publication->doi) DOI: {{ $publication->doi }}. @endif
                            </p>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Books -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="fas fa-book text-primary-custom me-2"></i>Buku</h3>
                    
                    <div class="row g-4">
                        @foreach($publications->where('type', 'book') as $book)
                        <div class="col-md-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body p-4">
                                    <h6 class="card-title">{{ $book->title }}</h6>
                                    <p class="card-text"><small class="text-muted"><strong>Penulis:</strong> {{ $book->authors }}</small></p>
                                    <p class="card-text"><small class="text-muted"><strong>Penerbit:</strong> {{ $book->publisher }}, {{ $book->year }}</small></p>
                                    @if($book->isbn)
                                    <p class="card-text"><small class="text-muted"><strong>ISBN:</strong> {{ $book->isbn }}</small></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        
                       
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="fas fa-copyright text-primary-custom me-2"></i>Hak Cipta & Kekayaan Intelektual</h3>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" width="5%">No</th>
                                    <th scope="col" width="45%">Judul / Nama Ciptaan</th>
                                    <th scope="col" width="20%">Jenis Ciptaan</th>
                                    <th scope="col" width="15%">No. Pencatatan</th>
                                    <th scope="col" width="15%">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($copyrights as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-medium" style="color: #2c3e50;">{{ $item['title'] }}</td>
                                    <td>{{ $item['type'] }}</td>
                                    <td><code class="text-dark">{{ $item['number'] }}</code></td>
                                    <td><span class="badge" style="background-color: #841818;">{{ $item['year'] }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Dataset -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 text-center">
                    <i class="fas fa-database text-primary-custom mb-3" style="font-size: 3rem;"></i>
                    <h5>Dataset</h5>
                    <p class="text-muted">Belum tersedia</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection