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
            
            <!-- Detailed Facilities -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-5"><i class="fas fa-box-open text-primary-custom me-2"></i>Daftar Detail Fasilitas</h3>
                    
                    @php
                    $detailedFacilities = [
                        [
                            'id' => 'f1',
                            'name' => 'HTC VIVE',
                            'available' => '2 set',
                            'code' => '',
                            'includes' => [
                                'HTC Vive Box', 
                                'Headset with 3 in 1 cable and audio cable (rear view)',
                                'Documentation', 
                                'Link Box Mounting Pad', 
                                'Base Station 2pcs', 
                                'Controller 2 pcs', 
                                'USB Cables', 
                                'HDMI Cables', 
                                'Earphone', 
                                'Face Cushion (narrow)', 
                                'Earbuds', 
                                'Link Box', 
                                'Sync Cable (optional)', 
                                'Mounting Kit'
                            ],
                            'images' => [
                                'vive-htc1-f1.png',
                                'vive-htc2-f1.png'
                            ]
                        ],
                        [
                            'id' => 'f2',
                            'name' => 'Oculus Rift S',
                            'available' => '2 set',
                            'code' => '',
                            'includes' => [
                                'Headset Oculus Rift S',
                                'Kabel DisplayPort',
                                'Kabel USB',
                                'Sensitisasi Gerakan Inside-Out',
                                'Dua Controller Oculus Touch',
                                'Baterai',
                                'Penyangga kepala',
                                'Dokumentasi dan Panduan'
                            ],
                            'images' => [
                                'oculus-rift-s1-f2.jpg',
                                'oculus-rift-s2-f2.jpg'
                            ]
                        ],
                        [
                            'id' => 'f3',
                            'name' => 'Oculus Quest',
                            'available' => '2 set',
                            'code' => '',
                            'includes' => [
                                'Headset Oculus Quest',
                                'Dua Controller Oculus Touch',
                                'Penyangga kepala',
                                'Kabel USB-C',
                                'Adaptor daya dan kabel pengisian',
                                'Dokumentasi dan Panduan'
                            ],
                            'images' => [
                                'oculus-quest-v1-1-f3.jpg',
                                'oculus-quest-v1-2-f3.jpg'
                            ]
                        ],
                        [
                            'id' => 'f4',
                            'name' => 'Oculus Quest 2',
                            'available' => '4 set',
                            'code' => '',
                            'includes' => [
                                'Headset Oculus Quest 2',
                                'Dua Controller Oculus Touch',
                                'Penyangga kepala',
                                'Kabel USB-C',
                                'Adaptor daya dan kabel pengisian',
                                'Dokumentasi dan Panduan',
                                'Glasses Spacer',
                                'Silicon Cover'
                            ],
                            'images' => [
                                'oculus-quest-meta2-1-f4.jpg',
                                'oculus-quest-meta2-2-f4.jpg'
                            ]
                        ],
                        [
                            'id' => 'f5',
                            'name' => 'Wacom Cintiq',
                            'available' => '2 set',
                            'code' => '',
                            'includes' => [
                                'Tablet grafis Wacom Cintiq',
                                'Pen stylus Wacom',
                                'Kabel USB atau kabel lainnya untuk menghubungkan tablet ke komputer',
                                'Adaptor daya atau kabel pengisian baterai (jika diperlukan)',
                                'Pen holder atau stand',
                                'Buku panduan dan dokumentasi'
                            ],
                            'images' => [
                                'waqom-cintiq-f5.jpg'
                            ]
                        ],
                        [
                            'id' => 'f6',
                            'name' => 'Kamera SLR Canon',
                            'available' => '2 set',
                            'code' => '',
                            'includes' => [
                                'Body camera',
                                'Lensa',
                                'Penutup lensa',
                                'Manual book'
                            ],
                            'images' => [
                                'kamera-slr-canon-f6.png'
                            ]
                        ],
                        [
                            'id' => 'f7',
                            'name' => 'PC ASUS ROG',
                            'available' => '2 set',
                            'code' => '',
                            'includes' => [
                                'PC ASUS ROG',
                                'Curved Gaming Monitor AOC',
                                'Keyboard',
                                'Mouse'
                            ],
                            'images' => [
                                'asus-rog-1set-f7.png.jpg'
                            ]
                        ],
                        [
                            'id' => 'f11',
                            'name' => 'Set Meja Kerja',
                            'available' => '2 set',
                            'code' => '',
                            'includes' => [
                                '2 Meja panjang',
                                '4 Kursi Hitam',
                                '1 Kursi Coklat'
                            ],
                            'images' => [
                                'set-meja-kerja-f11.png'
                            ]
                        ],
                        [
                            'id' => 'f9',
                            'name' => 'Set Meja Podcast',
                            'available' => '1 set',
                            'code' => '',
                            'includes' => [
                                '2 kursi tinggi',
                                '1 meja tinggi'
                            ],
                            'images' => [
                                'set-meja-podcast-f9.png'
                            ]
                        ],
                        [
                            'id' => 'f10',
                            'name' => 'Set Rekaman Video',
                            'available' => '2 set',
                            'code' => '',
                            'includes' => [
                                '2 Lighting',
                                'Audio Mixer',
                                'Sound system'
                            ],
                            'images' => [
                                'set-rekaman-video-f10.png'
                            ]
                        ]
                    ];
                    @endphp

                    <div class="row g-5" id="facilityListContainer">
                        @foreach($detailedFacilities as $facility)
                        <div class="col-12 facility-item-row">
                            <div class="row align-items-center">
                                <!-- Images Carousel -->
                                <div class="col-md-5 mb-4 mb-md-0">
                                    <div id="carousel-{{ $facility['id'] }}" class="carousel slide carousel-dark" data-bs-ride="carousel">
                                        <div class="carousel-inner rounded shadow-sm border" style="background: #fdfdfd;">
                                            @foreach($facility['images'] as $index => $img)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('assets/img/fasilitas/' . $img) }}" class="d-block w-100" alt="{{ $facility['name'] }}" style="height: 350px; object-fit: contain;">
                                            </div>
                                            @endforeach
                                        </div>
                                        @if(count($facility['images']) > 1)
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $facility['id'] }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $facility['id'] }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Details -->
                                <div class="col-md-7">
                                    <h4 class="fw-bold mb-3" style="color: #841818;">{{ $facility['name'] }}</h4>
                                    
                                    <div class="d-flex mb-4 gap-4 p-3 rounded" style="background-color: #f8f9fa; border-left: 4px solid #841818;">
                                        <div>
                                            <small class="text-muted d-block"><i class="fas fa-boxes me-2"></i>Jumlah Tersedia</small>
                                            <span class="fw-bold">{{ $facility['available'] }}</span>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block"><i class="fas fa-barcode me-2"></i>Kode Barang</small>
                                            <span class="fw-bold">{{ $facility['code'] ?: '-' }}</span>
                                        </div>
                                    </div>
                                    
                                    <h6 class="fw-bold mb-3">1 set terdiri dari:</h6>
                                    <div class="row pt-2">
                                        @php
                                            $chunks = array_chunk($facility['includes'], ceil(count($facility['includes']) / 2));
                                        @endphp
                                        @foreach($chunks as $chunk)
                                        <div class="col-sm-6">
                                            <ul class="list-unstyled text-muted mb-0">
                                                @foreach($chunk as $item)
                                                <li class="mb-2 d-flex align-items-start">
                                                    <i class="fas fa-check-circle mt-1 me-2" style="color: #841818; font-size: 0.8rem;"></i>
                                                    <span>{{ $item }}</span>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Pagination Controls -->
                    <div id="facilityPagination" class="d-flex justify-content-center mt-5"></div>
                </div>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 3; 
    const items = Array.from(document.querySelectorAll('.facility-item-row'));
    const paginationContainer = document.getElementById('facilityPagination');
    
    if (items.length === 0) return;
    
    const pageCount = Math.ceil(items.length / rowsPerPage);
    let currentPage = 1;
    
    function displayItems() {
        items.forEach((item, index) => {
            if (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) {
                item.style.display = 'block';
                // Dynamic border rendering inside pagination
                item.style.borderBottom = '2px dashed #dee2e6';
                item.style.paddingBottom = '3rem';
                item.style.marginBottom = '3rem';
                
                // Hide border on the last visible element of the page
                if (index === Math.min(currentPage * rowsPerPage, items.length) - 1) {
                    item.style.borderBottom = 'none';
                    item.style.paddingBottom = '0';
                    item.style.marginBottom = '0';
                }
            } else {
                item.style.display = 'none';
            }
        });
    }
    
    function setupPaginationLinks() {
        paginationContainer.innerHTML = '';
        if (pageCount <= 1) return;
        
        const ul = document.createElement('ul');
        ul.className = 'pagination';
        
        // Prev
        const prevLi = document.createElement('li');
        prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
        prevLi.innerHTML = `<a class="page-link" href="javascript:void(0)" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`;
        prevLi.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                updatePagination(true);
            }
        });
        ul.appendChild(prevLi);
        
        // Numerics
        for (let i = 1; i <= pageCount; i++) {
            const li = document.createElement('li');
            li.className = `page-item ${currentPage === i ? 'active' : ''}`;
            li.innerHTML = `<a class="page-link" href="javascript:void(0)">${i}</a>`;
            li.addEventListener('click', () => {
                currentPage = i;
                updatePagination(true);
            });
            ul.appendChild(li);
        }
        
        // Next
        const nextLi = document.createElement('li');
        nextLi.className = `page-item ${currentPage === pageCount ? 'disabled' : ''}`;
        nextLi.innerHTML = `<a class="page-link" href="javascript:void(0)" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`;
        nextLi.addEventListener('click', () => {
            if (currentPage < pageCount) {
                currentPage++;
                updatePagination(true);
            }
        });
        ul.appendChild(nextLi);
        
        paginationContainer.appendChild(ul);
    }
    
    function updatePagination(doScroll = false) {
        displayItems();
        setupPaginationLinks();
        if (doScroll) {
            const section = document.getElementById('facilityListContainer');
            if (section) {
                const y = section.getBoundingClientRect().top + window.pageYOffset - 150;
                window.scrollTo({top: y, behavior: 'smooth'});
            }
        }
    }
    
    updatePagination(false);
});
</script>

<style>
.pagination .page-item.active .page-link {
    background-color: #841818;
    border-color: #841818;
    color: white;
}
.pagination .page-link {
    color: #841818;
}
.pagination .page-link:hover {
    color: #a52020;
    background-color: #f8f9fa;
}
</style>
@endsection
