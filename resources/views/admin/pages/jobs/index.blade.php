@extends('admin.main')

@section('title', 'Kelola Job Postings - Admin Lab HCI')
@section('page-title', 'Kelola Job Postings')

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
            <i class="fas fa-briefcase mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $jobs->total() }}</h3>
            <p>Total Job Postings</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-check-circle mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $jobs->where('status', 'active')->count() }}</h3>
            <p>Job Aktif</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-times-circle mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $jobs->where('status', 'closed')->count() }}</h3>
            <p>Job Closed</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-users mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $jobs->sum('quota') }}</h3>
            <p>Total Quota</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-0">Kelola Job Postings</h2>
        <p class="text-muted">Manage lowongan kerja dan magang Lab HCI</p>
    </div>
    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Job Posting
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Job Postings</h5>
            <div class="d-flex gap-2">
                <form method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari job posting..." value="{{ request('search') }}" style="width: 200px;">
                    <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <select class="form-select form-select-sm" style="width: auto;">
                    <option>Semua Status</option>
                    <option>Active</option>
                    <option>Closed</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if($jobs->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Judul</th>
                        <th style="width: 100px;">Quota</th>
                        <th style="width: 120px;">Status</th>
                        <th style="width: 150px;">Deadline</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($jobs->currentPage() - 1) * $jobs->perPage() }}</td>
                        <td>
                            <h6 class="mb-1">{{ $item->title }}</h6>
                            <small class="text-muted">{{ Str::limit($item->description, 80) }}</small>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $item->quota }} orang</span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $item->status == 'active' ? 'success' : 'danger' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>
                            @if($item->deadline)
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $item->deadline->format('d M Y') }}
                                    <br>
                                    @if($item->deadline->isPast())
                                        <span class="text-danger">Expired</span>
                                    @else
                                        <span class="text-success">{{ $item->deadline->diffForHumans() }}</span>
                                    @endif
                                </small>
                            @else
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    Tidak ada deadline
                                </small>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.jobs.edit', $item) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.jobs.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus job posting ini?')">
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
        
        @if($jobs->hasPages())
        <div class="card-footer">
            @include('admin.partials.pagination', ['paginator' => $jobs])
        </div>
        @endif
        
        @else
        <div class="text-center py-5">
            <i class="fas fa-briefcase text-muted mb-3" style="font-size: 4rem;"></i>
            <h5 class="text-muted">Belum Ada Job Posting</h5>
            <p class="text-muted">Mulai dengan menambahkan lowongan kerja pertama</p>
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Job Posting Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection