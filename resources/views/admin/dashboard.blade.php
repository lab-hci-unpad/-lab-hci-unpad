@extends('admin.main')

@section('title', 'Dashboard - Admin Lab HCI')
@section('page-title', 'Dashboard')

@section('styles')
<style>
.stats-card {
    background: url('{{ asset('assets/img/card/card1.png') }}') center/cover no-repeat;
    color: #333;
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    border: none;
    box-shadow: 0 8px 25px rgba(132, 24, 24, 0.15);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.stats-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    backdrop-filter: blur(1px);
    z-index: 1;
}

.stats-card > * {
    position: relative;
    z-index: 2;
}

.stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 35px rgba(132, 24, 24, 0.25);
}

.stats-card h3 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.stats-card p {
    margin: 0;
    opacity: 0.95;
    font-weight: 500;
    font-size: 1.1rem;
}

.stats-card i {
    font-size: 1.2rem;
    margin-right: 0.5rem;
}

.page-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 16px;
    padding: 2rem;
    margin-bottom: 2rem;
}

.activity-card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    height: 100%;
}

.activity-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.activity-card .card-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-bottom: 1px solid #dee2e6;
    border-radius: 16px 16px 0 0 !important;
    padding: 1.5rem;
}

.activity-card .card-body {
    padding: 1.5rem;
}

.quick-action-card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.quick-action-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.quick-action-card .card-header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border-radius: 16px 16px 0 0 !important;
    padding: 1.5rem;
    border: none;
}

.quick-action-card .card-body {
    padding: 2rem;
}

.action-btn {
    border-radius: 12px;
    padding: 1rem;
    font-weight: 500;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.action-btn.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border: none;
}

.action-btn.btn-outline-primary {
    border-color: var(--primary-color);
    color: var(--primary-color);
}

.action-btn.btn-outline-primary:hover {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-color: transparent;
    color: white;
}

.news-item {
    padding: 1.25rem;
    border-radius: 12px;
    transition: all 0.3s ease;
    border: 1px solid #f1f3f4;
}

.news-item:hover {
    background: #f8f9fa;
    border-color: var(--primary-color);
    transform: translateX(5px);
}

.user-item {
    padding: 1.25rem;
    border-radius: 12px;
    transition: all 0.3s ease;
    border: 1px solid #f1f3f4;
}

.user-item:hover {
    background: #f8f9fa;
    border-color: var(--primary-color);
    transform: translateX(5px);
}

.user-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1.2rem;
}

.empty-state {
    padding: 3rem;
    text-align: center;
    color: #6c757d;
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

.section-title {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.section-title i {
    margin-right: 0.75rem;
    font-size: 1.2rem;
}
</style>
@endsection

@section('content')
<!-- Welcome Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1 class="mb-2">Selamat Datang, {{ Auth::user()->name }}! </h1>
            <p class="text-muted mb-0 lead">Kelola konten website Lab HCI dari panel admin ini</p>
        </div>
        <div class="col-md-4 text-md-end">
            <div class="d-flex align-items-center justify-content-md-end">
                <div class="me-3">
                    <small class="text-muted d-block">Terakhir login</small>
                    <strong>{{ now()->format('d M Y, H:i') }}</strong>
                </div>
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-5">
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-newspaper mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $stats['total_news'] }}</h3>
            <p>Total Berita</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-eye mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $stats['published_news'] }}</h3>
            <p>Berita Published</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-images mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $stats['total_gallery'] }}</h3>
            <p>Gallery Items</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-users mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $stats['total_users'] }}</h3>
            <p>Total Users</p>
        </div>
    </div>
</div>

<!-- Recent Activities -->
<h2 class="section-title">
    <i class="fas fa-clock"></i>
    Aktivitas Terbaru
</h2>

<div class="row g-4 mb-5">
    <!-- Recent News -->
    <div class="col-lg-8">
        <div class="card activity-card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="fas fa-newspaper me-2"></i>Berita Terbaru</h5>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
            </div>
            <div class="card-body p-0">
                @forelse($recent_news as $news)
                <div class="news-item {{ !$loop->last ? 'border-bottom' : '' }}">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset($news->featured_image) }}" alt="{{ $news->title }}" class="rounded me-3" style="width: 70px; height: 70px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-semibold">{{ Str::limit($news->title, 50) }}</h6>
                            <p class="text-muted small mb-2">{{ Str::limit($news->excerpt, 80) }}</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>{{ $news->created_at->format('d M Y') }}
                                    <span class="badge bg-{{ $news->status == 'published' ? 'success' : 'warning' }} ms-2">{{ ucfirst($news->status) }}</span>
                                </small>
                                <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <i class="fas fa-newspaper"></i>
                    <h6>Belum ada berita</h6>
                    <p class="mb-3">Mulai dengan menambahkan berita pertama</p>
                    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Tambah Berita</a>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    
    <!-- Recent Users -->
    <div class="col-lg-4">
        <div class="card activity-card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-users me-2"></i>User Terbaru</h5>
            </div>
            <div class="card-body p-0">
                @forelse($recent_users as $user)
                <div class="user-item {{ !$loop->last ? 'border-bottom' : '' }}">
                    <div class="d-flex align-items-center">
                        <div class="user-avatar me-3">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-semibold">{{ $user->name }}</h6>
                            <small class="text-muted d-block">{{ $user->email }}</small>
                            <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : 'primary' }} mt-1">{{ ucfirst($user->role) }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <i class="fas fa-users"></i>
                    <h6>Belum ada user</h6>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<h2 class="section-title">
    <i class="fas fa-bolt"></i>
    Quick Actions
</h2>

<div class="card quick-action-card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-rocket me-2"></i>Aksi Cepat</h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary action-btn w-100">
                    <i class="fas fa-plus me-2"></i>Tambah Berita
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline-primary action-btn w-100">
                    <i class="fas fa-images me-2"></i>Tambah Gallery
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="btn btn-outline-primary action-btn w-100">
                    <i class="fas fa-user-plus me-2"></i>Tambah User
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary action-btn w-100">
                    <i class="fas fa-external-link-alt me-2"></i>Lihat Website
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
console.log('Dashboard loaded - Professional version');

// Add some interactive effects
document.addEventListener('DOMContentLoaded', function() {
    // Animate stats cards on load
    const statsCards = document.querySelectorAll('.stats-card');
    statsCards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        }, index * 100);
    });
});
</script>
@endsection