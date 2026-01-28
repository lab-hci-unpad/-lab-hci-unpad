@extends('admin.main')

@section('title', 'Publications - Admin Lab HCI')
@section('page-title', 'Publications')

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
            <i class="fas fa-book mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $publications->total() }}</h3>
            <p>Total Publications</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-journal-whills mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $publications->where('type', 'journal')->count() }}</h3>
            <p>Journal Papers</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-users mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $publications->where('type', 'conference')->count() }}</h3>
            <p>Conference Papers</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-calendar mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $publications->where('year', date('Y'))->count() }}</h3>
            <p>Publications Tahun Ini</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Research</li>
                <li class="breadcrumb-item active">Publications</li>
            </ol>
        </nav>
        <h2 class="mb-0">Publications</h2>
        <p class="text-muted">Manage publikasi penelitian Lab HCI</p>
    </div>
    <a href="{{ route('admin.research.publications.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Publication
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Publications</h5>
            <div class="d-flex gap-2">
                <form method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari publication..." value="{{ request('search') }}" style="width: 200px;">
                    <select name="type" class="form-select form-select-sm ms-2" style="width: auto;" onchange="this.form.submit()">
                        <option value="">Semua Type</option>
                        <option value="journal" {{ request('type') == 'journal' ? 'selected' : '' }}>Journal</option>
                        <option value="conference" {{ request('type') == 'conference' ? 'selected' : '' }}>Conference</option>
                        <option value="workshop" {{ request('type') == 'workshop' ? 'selected' : '' }}>Workshop</option>
                        <option value="book" {{ request('type') == 'book' ? 'selected' : '' }}>Book</option>
                    </select>
                    <select name="year" class="form-select form-select-sm ms-2" style="width: auto;" onchange="this.form.submit()">
                        <option value="">Semua Tahun</option>
                        @for($i = date('Y'); $i >= 2020; $i--)
                            <option value="{{ $i }}" {{ request('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if($publications->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Title</th>
                        <th style="width: 150px;">Authors</th>
                        <th style="width: 100px;">Type</th>
                        <th style="width: 80px;">Year</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publications as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($publications->currentPage() - 1) * $publications->perPage() }}</td>
                        <td>
                            <h6 class="mb-1">{{ $item->title }}</h6>
                            <small class="text-muted">{{ $item->venue }}</small>
                        </td>
                        <td>
                            <small class="text-muted">{{ Str::limit($item->authors, 50) }}</small>
                        </td>
                        <td>
                            <span class="badge bg-{{ $item->type == 'journal' ? 'primary' : ($item->type == 'conference' ? 'success' : 'info') }}">
                                {{ ucfirst($item->type) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ $item->year }}</span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.research.publications.edit', $item) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.research.publications.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus publication ini?')">
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
        
        @if($publications->hasPages())
        <div class="card-footer">
            @include('admin.partials.pagination', ['paginator' => $publications])
        </div>
        @endif
        
        @else
        <div class="text-center py-5">
            <i class="fas fa-book text-muted mb-3" style="font-size: 4rem;"></i>
            <h5 class="text-muted">Belum Ada Publication</h5>
            <p class="text-muted">Mulai dengan menambahkan publikasi penelitian pertama</p>
            <a href="{{ route('admin.research.publications.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Publication Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection