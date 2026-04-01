@extends('user.main')

@section('title', 'Daftar Anggota - Lab HCI')

@section('content')
<!-- Hero Section -->
<section class="hero-section-small">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Daftar Anggota</h1>
                <p class="lead">Tim Lab HCI</p>
            </div>
        </div>
    </div>
</section>

@include('user.partials.breadcrumb', ['breadcrumbs' => [['title' => 'Tentang Kami', 'url' => '#'], ['title' => 'Daftar Anggota']]])

<div class="container section-padding" style="margin-top: 0;">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Current Members -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="fas fa-users text-primary-custom me-2"></i>Member Saat Ini</h3>
                    <div class="row g-4">
                        @php
                        $currentMembers = [
                            [
                                'name' => 'Dr. Mira Suryani, S.Pd., M.Kom',
                                'position' => 'Kepala Lab HCI',
                                'photo' => 'Mira Suryani.jpg',
                                'email' => 'mira.suryani@unpad.ac.id',
                                'bio' => 'Mira Suryani adalah dosen di bidang Informatika dan saat ini menjabat sebagai Ketua Laboratorium Human-Computer Interaction (HCI). Minat risetnya berfokus pada pengembangan antarmuka cerdas yang adaptif terhadap kondisi pengguna, khususnya berbasis beban kognitif. Penelitiannya mengintegrasikan eye-tracking, perilaku interaksi pengguna, serta pendekatan machine learning untuk merancang sistem pembelajaran yang lebih responsif dan personal. Selain itu, ia juga mengeksplorasi pemanfaatan teknologi imersif seperti Virtual Reality dalam konteks edukasi dan kesehatan, serta penggunaan AI untuk meningkatkan pengalaman pengguna dalam sistem digital.'
                            ],
                            [
                                'name' => 'Erick Paulus, S.Si., M.Kom',
                                'position' => 'Dosen',
                                'photo' => 'Erick Paulus.png',
                                'email' => 'erick.paulus@unpad.ac.id',
                                'bio' => 'Erick Paulus adalah dosen Teknologi Informasi di Universitas Padjadjaran yang memiliki minat pada pengembangan solusi digital berbasis teknologi informasi untuk menjawab kebutuhan industri dan masyarakat. Fokus keilmuannya mencakup rekayasa perangkat lunak, sistem informasi, serta pemanfaatan teknologi komputasi dalam mendukung transformasi digital. Ia aktif dalam kegiatan akademik, penelitian, dan pembinaan mahasiswa, khususnya dalam pengembangan sistem berbasis teknologi yang inovatif dan aplikatif.'
                            ],
                            [
                                'name' => 'Hasna Karimah, S.Kom., MT.',
                                'position' => 'Dosen',
                                'photo' => 'Hasna Karimah.jpg',
                                'email' => 'karimahasna98@gmail.com',
                                'bio' => 'Hasna Karimah merupakan alumni Teknik Informatika Universitas Padjadjaran yang saat ini berkontribusi sebagai Dosen Luar Biasa pada mata kuliah Interaksi Manusia dan Komputer (IMK). Ia memiliki ketertarikan pada bidang pengalaman pengguna (UX) dan perancangan antarmuka yang berpusat pada pengguna. Melalui pengajaran IMK, ia berperan dalam membekali mahasiswa dengan pemahaman konseptual dan praktis mengenai desain sistem yang usable, intuitif, dan selaras dengan kebutuhan pengguna. Selain itu, ia juga aktif mendorong pendekatan desain berbasis pengguna dalam pengembangan solusi digital.'
                            ],
                            [
                                'name' => 'Firas Atqiya, S.Kom., M.Si., M.Sc',
                                'position' => 'Dosen',
                                'photo' => 'Firas Atqiya.jpg',
                                'email' => 'firas.atqiya@unpad.ac.id',
                                'bio' => 'Firas Atqiya merupakan dosen pada bidang Interaksi Manusia dan Komputer (IMK) yang memiliki minat pada perancangan sistem interaktif yang berpusat pada pengguna. Fokus pengajarannya mencakup prinsip usability, desain antarmuka, serta evaluasi pengalaman pengguna dalam pengembangan produk digital. Melalui perannya dalam pembelajaran IMK, ia berkontribusi dalam membentuk mahasiswa dengan pendekatan desain yang sistematis, kontekstual, dan berbasis kebutuhan pengguna untuk menghasilkan solusi teknologi yang efektif dan bermakna.'
                            ]
                        ];
                        @endphp
                        
                        @foreach($currentMembers as $index => $member)
                        <div class="col-md-6 col-lg-3">
                            <div class="text-center" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#memberModal{{ $index }}">
                                <div class="mb-3 position-relative">
                                    <img src="{{ asset('assets/img/anggota/' . $member['photo']) }}" alt="{{ $member['name'] }}" class="rounded-circle member-photo" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #841818; transition: all 0.3s;">
                                    <div class="photo-overlay">
                                        <i class="fas fa-info-circle"></i>
                                    </div>
                                </div>
                                <h6 class="mb-2">{{ $member['name'] }}</h6>
                                <p class="text-primary-custom mb-2" style="font-weight: 500;">{{ $member['position'] }}</p>
                                <small class="text-muted"><i class="fas fa-mouse-pointer me-1"></i>Klik untuk detail</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Active Master Students -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4 d-flex justify-content-between align-items-center collapsed" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseMagisterAktif" aria-expanded="false">
                        <span><i class="fas fa-graduation-cap text-primary-custom me-2"></i>Mahasiswa Program Magister Aktif</span>
                        <svg class="collapse-icon text-muted" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </h3>
                    <div class="collapse" id="collapseMagisterAktif">
                        <div class="table-responsive mt-3">
                        <table class="table table-hover" id="magisterAktifTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $magisterAktifStudents = [
                                    'Tsabita Angger Pangestuti, drg'
                                ];
                                @endphp
                                
                                @foreach($magisterAktifStudents as $index => $student)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $student }}</td>
                                    <td><span class="badge" style="background-color: #841818;">Aktif</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="magisterAktifPagination" class="d-flex justify-content-center mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Students -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4 d-flex justify-content-between align-items-center collapsed" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseSarjanaAktif" aria-expanded="false">
                        <span><i class="fas fa-graduation-cap text-primary-custom me-2"></i>Mahasiswa Program Sarjana Aktif</span>
                        <svg class="collapse-icon text-muted" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </h3>
                    <div class="collapse" id="collapseSarjanaAktif">
                        <div class="table-responsive mt-3">
                        <table class="table table-hover" id="activeTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $activeStudents = [
                                    'Ardes Zubka Putra',
                                    'Chienta Fleury',
                                    'Dimas Falah Arianto',
                                    'Salsabila Dean Putri (Prodi Bisnis Digital)',
                                    'Michelle Patricia Jakfar (Prodi Kedokteran Gigi)',
                                    'Abdurrahman Hafizh (Prodi Kedokteran Gigi)',
                                    'Darren Christian Liharja',
                                    'Muhammad Satria Dharma (Asisten Dosen)',
                                    'Jason Natanael Kristianto',
                                    'Oriex Mawan Junnior',
                                    'Agra Palasara',
                                    'Faizzani Zingsky Pratiwi',
                                    'Muhammad Wildan Kamil',
                                    'Muhammad Rumi Rifai',
                                    'Tegar Muhammad Rizki'
                                ];
                                @endphp
                                
                                @foreach($activeStudents as $index => $student)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $student }}</td>
                                    <td><span class="badge" style="background-color: #841818;">Aktif</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="activePagination" class="d-flex justify-content-center mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Doktoral Alumni Table -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4 d-flex justify-content-between align-items-center collapsed" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseDoktoralAlumni" aria-expanded="false">
                        <span><i class="fas fa-user-graduate text-primary-custom me-2"></i>Mahasiswa Program Doktoral yang Telah Lulus</span>
                        <svg class="collapse-icon text-muted" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </h3>
                    <div class="collapse" id="collapseDoktoralAlumni">
                        <div class="table-responsive mt-3">
                        <table class="table table-hover" id="doktoralAlumniTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $doktoralAlumni = [
                                    'Kolonel Laut (K/W) Dr. drg. Zelvya Purnama Rika, Sp.KGA, FICD, CIQnR, CIQaR (Fakultas Kedokteran Unpad)'
                                ];
                                @endphp
                                
                                @foreach($doktoralAlumni as $index => $alumnus)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $alumnus }}</td>
                                    <td><span class="badge" style="background-color: #841818;">Alumni</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="doktoralAlumniPagination" class="d-flex justify-content-center mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alumni Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h3 class="mb-4 d-flex justify-content-between align-items-center collapsed" style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseSarjanaAlumni" aria-expanded="false">
                        <span><i class="fas fa-user-graduate text-primary-custom me-2"></i>Mahasiswa Program Sarjana yang Telah Lulus</span>
                        <svg class="collapse-icon text-muted" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </h3>
                    <div class="collapse" id="collapseSarjanaAlumni">
                        <div class="table-responsive mt-3">
                        <table class="table table-hover" id="alumniTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $alumni = [
                                    'Riva Farabi, S.Kom',
                                    'Syafira Predeisyanti, S.Kom',
                                    'Gilang Nusantara Barry Putra, S.Kom',
                                    'Hasna Karimah, S.Kom, MT.',
                                    'Dzakia Rayhana, S.Kom',
                                    'Reynaldi Noer Rizki, S.Kom',
                                    'Syafira Fitra Annisa, S.Kom',
                                    'Zaenal Muttaqien, S.Kom',
                                    'Kevin Andrew Agustinus J Waworuntu, S.Kom',
                                    'Haris Putratama, S.Kom',
                                    'Bening Kusumahati, S.Kom',
                                    'Alaa Illiyya, S.Kom',
                                    'Agnes Hata, S.Kom',
                                    'Raditya Prirahmadian, S.Kom',
                                    'Beryl Cleary Hermanto, S.Kom',
                                    'Raihan Luthfiandi Muhammad, S.Kom',
                                    'Ilham Kusuma Aji, S.Kom',
                                    'Fadhli Hibatul Haqqi, S.Kom',
                                    'Fakhri Fajar Ramadhan, S.Kom',
                                    'Amir Salim, S.Kom',
                                    'Hudzaifah Al Mutaz Billah, S.Kom',
                                    'Prames Ray Lapian, S.Kom',
                                    'Stevanus Felixiano, S.Kom',
                                    'Marciano Lie, S.Kom',
                                    'Hanif Fathanmubin, S.Kom',
                                    'Wafa Tsabita, S.Kom',
                                    'Guntur Eka Putra, S.Kom'
                                ];
                                @endphp
                                
                                @foreach($alumni as $index => $alumnus)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $alumnus }}</td>
                                    <td><span class="badge" style="background-color: #841818;">Alumni</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div id="alumniPagination" class="d-flex justify-content-center mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Member Detail Modals -->
@php
$currentMembers = [
    [
        'name' => 'Dr. Mira Suryani, S.Pd., M.Kom',
        'position' => 'Kepala Lab HCI',
        'photo' => 'Mira Suryani.jpg',
        'email' => 'mira.suryani@unpad.ac.id',
        'bio' => 'Mira Suryani adalah dosen di bidang Informatika dan saat ini menjabat sebagai Ketua Laboratorium Human-Computer Interaction (HCI). Minat risetnya berfokus pada pengembangan antarmuka cerdas yang adaptif terhadap kondisi pengguna, khususnya berbasis beban kognitif. Penelitiannya mengintegrasikan eye-tracking, perilaku interaksi pengguna, serta pendekatan machine learning untuk merancang sistem pembelajaran yang lebih responsif dan personal. Selain itu, ia juga mengeksplorasi pemanfaatan teknologi imersif seperti Virtual Reality dalam konteks edukasi dan kesehatan, serta penggunaan AI untuk meningkatkan pengalaman pengguna dalam sistem digital.'
    ],
    [
        'name' => 'Erick Paulus, S.Si., M.Kom',
        'position' => 'Dosen',
        'photo' => 'Erick Paulus.png',
        'email' => 'erick.paulus@unpad.ac.id',
        'bio' => 'Erick Paulus adalah dosen Teknologi Informasi di Universitas Padjadjaran yang memiliki minat pada pengembangan solusi digital berbasis teknologi informasi untuk menjawab kebutuhan industri dan masyarakat. Fokus keilmuannya mencakup rekayasa perangkat lunak, sistem informasi, serta pemanfaatan teknologi komputasi dalam mendukung transformasi digital. Ia aktif dalam kegiatan akademik, penelitian, dan pembinaan mahasiswa, khususnya dalam pengembangan sistem berbasis teknologi yang inovatif dan aplikatif.'
    ],
    [
        'name' => 'Hasna Karimah, S.Kom., MT.',
        'position' => 'Dosen',
        'photo' => 'Hasna Karimah.jpg',
        'email' => 'karimahasna98@gmail.com',
        'bio' => 'Hasna Karimah merupakan alumni Teknik Informatika Universitas Padjadjaran yang saat ini berkontribusi sebagai Dosen Luar Biasa pada mata kuliah Interaksi Manusia dan Komputer (IMK). Ia memiliki ketertarikan pada bidang pengalaman pengguna (UX) dan perancangan antarmuka yang berpusat pada pengguna. Melalui pengajaran IMK, ia berperan dalam membekali mahasiswa dengan pemahaman konseptual dan praktis mengenai desain sistem yang usable, intuitif, dan selaras dengan kebutuhan pengguna. Selain itu, ia juga aktif mendorong pendekatan desain berbasis pengguna dalam pengembangan solusi digital.'
    ],
    [
        'name' => 'Firas Atqiya, S.Kom., M.Si., M.Sc',
        'position' => 'Dosen',
        'photo' => 'Firas Atqiya.jpg',
        'email' => 'firas.atqiya@unpad.ac.id',
        'bio' => 'Firas Atqiya merupakan dosen pada bidang Interaksi Manusia dan Komputer (IMK) yang memiliki minat pada perancangan sistem interaktif yang berpusat pada pengguna. Fokus pengajarannya mencakup prinsip usability, desain antarmuka, serta evaluasi pengalaman pengguna dalam pengembangan produk digital. Melalui perannya dalam pembelajaran IMK, ia berkontribusi dalam membentuk mahasiswa dengan pendekatan desain yang sistematis, kontekstual, dan berbasis kebutuhan pengguna untuk menghasilkan solusi teknologi yang efektif dan bermakna.'
    ]
];
@endphp

@foreach($currentMembers as $index => $member)
<div class="modal fade" id="memberModal{{ $index }}" tabindex="-1" aria-labelledby="memberModalLabel{{ $index }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header" style="background: linear-gradient(135deg, #841818 0%, #a52020 100%); color: white; border: none;">
                <h5 class="modal-title" id="memberModalLabel{{ $index }}">
                    <i class="fas fa-user-circle me-2"></i>Profile Dosen
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        <img src="{{ asset('assets/img/anggota/' . $member['photo']) }}" alt="{{ $member['name'] }}" class="img-fluid rounded" style="max-width: 200px; border: 3px solid #841818;">
                    </div>
                    <div class="col-md-8">
                        <h4 class="mb-2" style="color: #841818;">{{ $member['name'] }}</h4>
                        <p class="text-muted mb-3"><i class="fas fa-briefcase me-2"></i>{{ $member['position'] }}</p>
                        <div class="mb-3">
                            <h6 style="color: #841818;"><i class="fas fa-info-circle me-2"></i>Tentang</h6>
                            <p class="text-justify" style="text-align: justify;">{{ $member['bio'] }}</p>
                        </div>
                        <div class="mb-2">
                            <h6 style="color: #841818;"><i class="fas fa-envelope me-2"></i>Email</h6>
                            <a href="mailto:{{ $member['email'] }}" class="text-decoration-none" style="color: #841818;">
                                {{ $member['email'] }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
.member-photo {
    position: relative;
}

.member-photo:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(132, 24, 24, 0.3);
}

.photo-overlay {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: rgba(132, 24, 24, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
}

.photo-overlay i {
    color: white;
    font-size: 2rem;
}

[data-bs-toggle="modal"]:hover .photo-overlay {
    opacity: 1;
}

.modal-content {
    border-radius: 15px;
    overflow: hidden;
}

.modal-header {
    padding: 1.5rem;
}

.modal-body {
    max-height: 70vh;
    overflow-y: auto;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function setupPagination(tableId, paginationId, rowsPerPage) {
        const table = document.getElementById(tableId);
        if(!table) return;
        const tbody = table.querySelector('tbody');
        const rows = tbody.querySelectorAll('tr');
        const pageCount = Math.ceil(rows.length / rowsPerPage);
        const pagination = document.getElementById(paginationId);
        
        if (pageCount <= 1) return;

        let currentPage = 1;

        function displayRows() {
            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            
            rows.forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function setupPaginationLinks() {
            pagination.innerHTML = '';
            
            const ul = document.createElement('ul');
            ul.className = 'pagination justify-content-center mt-3 mb-0';

            const prevLi = document.createElement('li');
            prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
            prevLi.innerHTML = `<a class="page-link" href="javascript:void(0)" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`;
            prevLi.addEventListener('click', (e) => {
                if (currentPage > 1) {
                    currentPage--;
                    updatePagination();
                }
            });
            ul.appendChild(prevLi);

            for (let i = 1; i <= pageCount; i++) {
                const li = document.createElement('li');
                li.className = `page-item ${currentPage === i ? 'active' : ''}`;
                li.innerHTML = `<a class="page-link" href="javascript:void(0)">${i}</a>`;
                li.addEventListener('click', () => {
                    currentPage = i;
                    updatePagination();
                });
                ul.appendChild(li);
            }

            const nextLi = document.createElement('li');
            nextLi.className = `page-item ${currentPage === pageCount ? 'disabled' : ''}`;
            nextLi.innerHTML = `<a class="page-link" href="javascript:void(0)" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`;
            nextLi.addEventListener('click', (e) => {
                if (currentPage < pageCount) {
                    currentPage++;
                    updatePagination();
                }
            });
            ul.appendChild(nextLi);

            pagination.appendChild(ul);
        }

        function updatePagination() {
            displayRows();
            setupPaginationLinks();
        }

        updatePagination();
    }

    setupPagination('magisterAktifTable', 'magisterAktifPagination', 10);
    setupPagination('activeTable', 'activePagination', 10);
    setupPagination('doktoralAlumniTable', 'doktoralAlumniPagination', 10);
    setupPagination('alumniTable', 'alumniPagination', 10);
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
.collapse-icon {
    display: inline-block;
    transition: transform 0.3s ease;
}
[data-bs-toggle="collapse"].collapsed .collapse-icon {
    transform: rotate(0deg);
}
[data-bs-toggle="collapse"]:not(.collapsed) .collapse-icon {
    transform: rotate(180deg);
}
</style>
@endsection