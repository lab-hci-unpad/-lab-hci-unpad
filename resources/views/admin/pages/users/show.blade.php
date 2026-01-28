@extends('admin.main')

@section('title', 'Detail User - Admin Lab HCI')
@section('page-title', 'Detail User')

@section('styles')
<style>
.profile-header {
    background: linear-gradient(135deg, #841818, #a52a2a);
    color: white;
    border-radius: 12px 12px 0 0;
    padding: 2rem;
}

.profile-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: rgba(255,255,255,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    font-weight: 600;
    border: 3px solid rgba(255,255,255,0.3);
}

.info-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.info-card:hover {
    box-shadow: 0 4px 20px rgba(0,0,0,0.12);
    transform: translateY(-2px);
}
</style>
@endsection

@section('content')
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Detail User</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-8 mx-auto">
        <!-- Profile Header -->
        <div class="info-card card mb-4">
            <div class="profile-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="profile-avatar me-4">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="mb-1">{{ $user->name }}</h2>
                            <p class="mb-2 opacity-75">{{ $user->email }}</p>
                            <div class="d-flex gap-2">
                                <span class="badge {{ $user->role == 'admin' ? 'bg-warning' : 'bg-info' }} text-dark">
                                    {{ ucfirst($user->role) }}
                                </span>
                                @if($user->id == Auth::id())
                                    <span class="badge bg-light text-dark">You</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-light me-2">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="info-card card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Informasi Dasar</h6>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">ID User</label>
                            <p class="mb-0">{{ $user->id }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Nama Lengkap</label>
                            <p class="mb-0">{{ $user->name }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Email</label>
                            <p class="mb-0">{{ $user->email }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Role</label>
                            <p class="mb-0">
                                <span class="badge {{ $user->role == 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </p>
                        </div>

                        @if($user->nim)
                        <div class="mb-3">
                            <label class="form-label text-muted">NIM</label>
                            <p class="mb-0">{{ $user->nim }}</p>
                        </div>
                        @endif
                    </div>
                    
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Informasi Tambahan</h6>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Status Email</label>
                            <p class="mb-0">
                                @if($user->email_verified_at)
                                    <span class="badge bg-success">Verified</span>
                                    <small class="text-muted d-block">{{ $user->email_verified_at->format('d M Y H:i') }}</small>
                                @else
                                    <span class="badge bg-warning">Not Verified</span>
                                @endif
                            </p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Bergabung</label>
                            <p class="mb-0">{{ $user->created_at->format('d M Y H:i') }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-muted">Terakhir Update</label>
                            <p class="mb-0">{{ $user->updated_at->format('d M Y H:i') }}</p>
                        </div>

                        @if($user->phone)
                        <div class="mb-3">
                            <label class="form-label text-muted">Telepon</label>
                            <p class="mb-0">{{ $user->phone }}</p>
                        </div>
                        @endif

                        @if($user->faculty)
                        <div class="mb-3">
                            <label class="form-label text-muted">Fakultas</label>
                            <p class="mb-0">{{ $user->faculty }}</p>
                        </div>
                        @endif

                        @if($user->major)
                        <div class="mb-3">
                            <label class="form-label text-muted">Jurusan</label>
                            <p class="mb-0">{{ $user->major }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <small class="text-muted">
                        <i class="fas fa-clock me-1"></i>
                        Dibuat {{ $user->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        </div>
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