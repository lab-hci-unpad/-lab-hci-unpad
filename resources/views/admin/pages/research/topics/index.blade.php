@extends('admin.main')

@section('title', 'Research Topics - Admin Lab HCI')
@section('page-title', 'Research Topics')

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
            <i class="fas fa-microscope mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $topics->total() }}</h3>
            <p>Total Topics</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-check-circle mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $topics->where('is_active', 1)->count() }}</h3>
            <p>Active Topics</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-pause-circle mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $topics->where('is_active', 0)->count() }}</h3>
            <p>Inactive Topics</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-calendar mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $topics->where('created_at', '>=', now()->startOfMonth())->count() }}</h3>
            <p>Topics Bulan Ini</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Research</li>
                <li class="breadcrumb-item active">Topics</li>
            </ol>
        </nav>
        <h2 class="mb-0">Research Topics</h2>
        <p class="text-muted">Manage topik penelitian Lab HCI</p>
    </div>
    <a href="{{ route('admin.research.topics.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Topic
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Research Topics</h5>
            <div class="d-flex gap-2">
                <form method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari topic..." value="{{ request('search') }}" style="width: 200px;">
                    <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if($topics->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama Topic</th>
                        <th>Deskripsi</th>
                        <th style="width: 100px;">Status</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topics as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($topics->currentPage() - 1) * $topics->perPage() }}</td>
                        <td>
                            <h6 class="mb-1">{{ $item->name }}</h6>
                            <small class="text-muted">{{ $item->slug }}</small>
                        </td>
                        <td>
                            <small class="text-muted">{{ Str::limit($item->description, 100) }}</small>
                        </td>
                        <td>
                            <span class="badge bg-{{ $item->is_active ? 'success' : 'secondary' }}">
                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.research.topics.edit', $item) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.research.topics.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus topic ini?')">
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
        
        @if($topics->hasPages())
        <div class="card-footer">
            @include('admin.partials.pagination', ['paginator' => $topics])
        </div>
        @endif
        
        @else
        <div class="text-center py-5">
            <i class="fas fa-microscope text-muted mb-3" style="font-size: 4rem;"></i>
            <h5 class="text-muted">Belum Ada Research Topic</h5>
            <p class="text-muted">Mulai dengan menambahkan topik penelitian pertama</p>
            <a href="{{ route('admin.research.topics.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Topic Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection