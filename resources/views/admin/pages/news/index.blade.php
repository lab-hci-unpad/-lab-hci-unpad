@extends('admin.main')

@section('title', 'Kelola Berita - Admin Lab HCI')
@section('page-title', 'Kelola Berita')

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
</style>
@endsection

@section('content')
<!-- Statistics Cards -->
<div class="row g-4 mb-5">
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-newspaper mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $news->total() }}</h3>
            <p>Total Berita</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-eye mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $news->where('status', 'published')->count() }}</h3>
            <p>Berita Published</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-edit mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $news->where('status', 'draft')->count() }}</h3>
            <p>Draft Berita</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-calendar mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $news->where('created_at', '>=', now()->startOfMonth())->count() }}</h3>
            <p>Berita Bulan Ini</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-0">Kelola Berita</h2>
        <p class="text-muted">Manage semua berita dan artikel Lab HCI</p>
    </div>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Berita
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Berita</h5>
            <div class="d-flex gap-2">
                <form method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari berita..." value="{{ request('search') }}" style="width: 200px;">
                    <select name="status" class="form-select form-select-sm ms-2" style="width: auto;" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if($news->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 80px;">Image</th>
                        <th>Judul</th>
                        <th style="width: 120px;">Status</th>
                        <th style="width: 150px;">Tanggal Publish</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($news->currentPage() - 1) * $news->perPage() }}</td>
                        <td>
                            <img src="{{ asset($item->featured_image) }}" alt="{{ $item->title }}" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                        </td>
                        <td>
                            <h6 class="mb-1">{{ $item->title }}</h6>
                            <small class="text-muted">{{ Str::limit($item->excerpt, 80) }}</small>
                        </td>
                        <td>
                            <span class="badge bg-{{ $item->status == 'published' ? 'success' : 'warning' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $item->published_at->format('d M Y') }}
                                <br>
                                <i class="fas fa-clock me-1"></i>
                                {{ $item->published_at->format('H:i') }}
                            </small>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('news.show', $item->slug) }}" target="_blank" class="btn btn-sm btn-outline-info" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.news.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($news->hasPages())
        <div class="card-footer">
            @include('admin.partials.pagination', ['paginator' => $news])
        </div>
        @endif
        
        @else
        <div class="text-center py-5">
            <i class="fas fa-newspaper text-muted mb-3" style="font-size: 4rem;"></i>
            <h5 class="text-muted">Belum Ada Berita</h5>
            <p class="text-muted">Mulai dengan menambahkan berita pertama untuk Lab HCI</p>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Berita Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection