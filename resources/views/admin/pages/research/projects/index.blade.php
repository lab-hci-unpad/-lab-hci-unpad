@extends('admin.main')

@section('title', 'Research Projects - Admin Lab HCI')
@section('page-title', 'Research Projects')

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
            <i class="fas fa-project-diagram mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $projects->total() }}</h3>
            <p>Total Projects</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-play-circle mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $projects->where('status', 'ongoing')->count() }}</h3>
            <p>Ongoing Projects</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-check-circle mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $projects->where('status', 'completed')->count() }}</h3>
            <p>Completed Projects</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-calendar mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $projects->where('year', date('Y'))->count() }}</h3>
            <p>Projects Tahun Ini</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Research</li>
                <li class="breadcrumb-item active">Projects</li>
            </ol>
        </nav>
        <h2 class="mb-0">Research Projects</h2>
        <p class="text-muted">Manage proyek penelitian Lab HCI</p>
    </div>
    <a href="{{ route('admin.research.projects.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Project
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Research Projects</h5>
            <div class="d-flex gap-2">
                <form method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari project..." value="{{ request('search') }}" style="width: 200px;">
                    <select name="status" class="form-select form-select-sm ms-2" style="width: auto;" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="planned" {{ request('status') == 'planned' ? 'selected' : '' }}>Planned</option>
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
        @if($projects->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Title</th>
                        <th style="width: 150px;">Funding Source</th>
                        <th style="width: 80px;">Year</th>
                        <th style="width: 100px;">Status</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + ($projects->currentPage() - 1) * $projects->perPage() }}</td>
                        <td>
                            <h6 class="mb-1">{{ $item->title }}</h6>
                            <small class="text-muted">{{ Str::limit($item->description, 80) }}</small>
                        </td>
                        <td>
                            <small class="text-muted">{{ $item->funding_source }}</small>
                        </td>
                        <td>
                            <span class="badge bg-secondary">{{ $item->year }}</span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $item->status == 'completed' ? 'success' : ($item->status == 'ongoing' ? 'primary' : 'danger') }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.research.projects.edit', $item) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.research.projects.destroy', $item) }}" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus project ini?')">
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
        
        @if($projects->hasPages())
        <div class="card-footer">
            @include('admin.partials.pagination', ['paginator' => $projects])
        </div>
        @endif
        
        @else
        <div class="text-center py-5">
            <i class="fas fa-project-diagram text-muted mb-3" style="font-size: 4rem;"></i>
            <h5 class="text-muted">Belum Ada Research Project</h5>
            <p class="text-muted">Mulai dengan menambahkan proyek penelitian pertama</p>
            <a href="{{ route('admin.research.projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Project Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection