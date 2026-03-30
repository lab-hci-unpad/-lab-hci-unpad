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
                            ['name' => 'Dr. Mira Suryani, S.Pd., M.Kom', 'position' => 'Kepala Lab HCI', 'photo' => 'Mira Suryani.jpg'],
                            ['name' => 'Erick Paulus, S.Si., M.Kom', 'position' => 'Dosen', 'photo' => 'Erick Paulus.png'],
                            ['name' => 'Hasna Karimah, S.Kom., MT.', 'position' => 'Dosen', 'photo' => 'Hasna Karimah.jpg'],
                            ['name' => 'Firas Atqiya, S.Kom., M.Si., M.Sc', 'position' => 'Dosen', 'photo' => 'Firas Atqiya.jpg']
                        ];
                        @endphp
                        
                        @foreach($currentMembers as $member)
                        <div class="col-md-6 col-lg-3">
                            <div class="text-center">
                                <div class="mb-3">
                                    <img src="{{ asset('assets/img/anggota/' . $member['photo']) }}" alt="{{ $member['name'] }}" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #841818;">
                                </div>
                                <h6 class="mb-2">{{ $member['name'] }}</h6>
                                <p class="text-primary-custom mb-0" style="font-weight: 500;">{{ $member['position'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Active Students -->
            <div class="card border-0 shadow-sm mb-5">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="fas fa-graduation-cap text-primary-custom me-2"></i>Mahasiswa Program Sarjana Aktif</h3>
                    <div class="row g-4">
                        @php
                        $activeStudents = [
                            ['name' => 'Ardes Zubka Putra', 'desc' => 'Fokus penelitian: Augmented Reality untuk Pembelajaran', 'photo' => 'Ardes Zubka Putra.jpg'],
                            ['name' => 'Amir Salim', 'desc' => 'Fokus penelitian: User Experience Design', 'photo' => 'Amir Salim.jpg'],
                            ['name' => 'Hudzaifah Al Mutaz Billah', 'desc' => 'Fokus penelitian: Virtual Reality Applications', 'photo' => 'Hudzaifah Al Mutaz Billah.jpg'],
                            ['name' => 'Prames Ray Lapian', 'desc' => 'Fokus penelitian: Human-Computer Interaction', 'photo' => 'Prames Ray Lapian.jpg']
                        ];
                        @endphp
                        
                        @foreach($activeStudents as $student)
                        <div class="col-md-6 col-lg-3">
                            <div class="text-center">
                                <div class="mb-3">
                                    @php $studentPhotoPath = public_path('assets/img/anggota/' . $student['photo']); @endphp
                                    @if(file_exists($studentPhotoPath))
                                    <img src="{{ asset('assets/img/anggota/' . $student['photo']) }}" alt="{{ $student['name'] }}" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #841818;">
                                    @else
                                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 100px; height: 100px; background-color: #f0e6e6; border: 2px solid #841818;">
                                        <i class="fas fa-user" style="font-size: 2.5rem; color: #841818;"></i>
                                    </div>
                                    @endif
                                </div>
                                <h6 class="mb-2">{{ $student['name'] }}</h6>
                                <p class="text-muted mb-0" style="font-size: 0.85rem;">{{ $student['desc'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Alumni Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h3 class="mb-4"><i class="fas fa-user-graduate text-primary-custom me-2"></i>Mahasiswa Program Sarjana yang Telah Lulus</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                                    'Riva Farabi', 'Syafira Predeisyanti', 'Gilang Nusantara Barry Putra',
                                    'Hasna Karimah', 'Dzakia Rayhana', 'Reynaldi Noer Rizki',
                                    'Syafira Fitra Annisa', 'Zaenal Muttaqien', 'Kevin Andrew Agustinus J Waworuntu',
                                    'Haris Putratama', 'Bening Kusumahati', 'Alaa Illiyya',
                                    'Agnes Hata', 'Raditya Prirahmadian', 'Beryl Cleary Hermanto',
                                    'Raihan Luthfiandi Muhammad', 'Ilham Kusuma Aji', 'Fadhli Hibatul Haqqi'
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection