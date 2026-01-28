@extends('admin.main')

@section('title', 'Kelola Users - Admin Lab HCI')
@section('page-title', 'Kelola Users')

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

.avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1rem;
}
</style>
@endsection

@section('content')
<!-- Statistics Cards -->
<div class="row g-4 mb-5">
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-users mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $users->total() }}</h3>
            <p>Total Users</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-user-shield mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $users->where('role', 'admin')->count() }}</h3>
            <p>Admin Users</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-user-graduate mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $users->where('role', 'mahasiswa')->count() }}</h3>
            <p>Mahasiswa</p>
        </div>
    </div>
    
    <div class="col-md-6 col-xl-3">
        <div class="card stats-card">
            <i class="fas fa-calendar mb-3" style="font-size: 2.5rem; opacity: 0.8;"></i>
            <h3>{{ $users->where('created_at', '>=', now()->startOfMonth())->count() }}</h3>
            <p>User Baru Bulan Ini</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="mb-1">Kelola Users</h2>
        <p class="text-muted mb-0">Manajemen pengguna sistem Lab HCI</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah User
    </a>
</div>

<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="mb-0"><i class="fas fa-users me-2"></i>Daftar Users</h5>
            </div>
            <div class="col-auto">
                <form method="GET" class="d-flex">
                    <input type="text" class="form-control me-2" name="search" value="{{ request('search') }}" placeholder="Cari user...">
                    <select name="role" class="form-select me-2" style="width: auto;" onchange="this.form.submit()">
                        <option value="">Semua Role</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="mahasiswa" {{ request('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    </select>
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @if($users->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Bergabung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle me-3">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <strong>{{ $user->name }}</strong>
                                        @if($user->id == Auth::id())
                                            <span class="badge bg-info ms-2">You</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role == 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-outline-info" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($user->id != Auth::id())
                                        <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="deleteUser({{ $user->id }}, '{{ $user->name }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($users->hasPages())
                <div class="card-footer">
                    {{ $users->links('admin.partials.pagination') }}
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <i class="fas fa-users text-muted mb-3" style="font-size: 3rem;"></i>
                <h5 class="text-muted">Tidak ada user ditemukan</h5>
                <p class="text-muted">Belum ada user yang terdaftar dalam sistem.</p>
            </div>
        @endif
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus user <strong id="userName"></strong>?</p>
                <p class="text-danger small">Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function deleteUser(userId, userName) {
    document.getElementById('userName').textContent = userName;
    document.getElementById('deleteForm').action = `/admin/users/${userId}`;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endsection