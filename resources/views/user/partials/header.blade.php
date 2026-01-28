<nav class="navbar navbar-expand-lg navbar-custom navbar-transparent">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/logo/logo_unpad2.png') }}" alt="Lab HCI"  height="100" class="me-2">
            
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Tentang
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('about.profile') }}">Profil Lab</a></li>
                        <li><a class="dropdown-item" href="{{ route('about.members') }}">Anggota</a></li>
                        <li><a class="dropdown-item" href="{{ route('about.facilities') }}">Fasilitas</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Akademik
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('research.topics') }}">Penelitian</a></li>
                        <li><a class="dropdown-item" href="{{ route('research.publications') }}">Publikasi</a></li>
                        <li><a class="dropdown-item" href="{{ route('gallery') }}">Gallery</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Layanan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Dataset</a></li>
                        <li><a class="dropdown-item" href="{{ route('reservation') }}">Reservasi Lab</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Informasi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('news') }}">Berita & Acara</a></li>
                        <li><a class="dropdown-item" href="{{ route('collaboration') }}">Kerja Sama</a></li>
                        <li><a class="dropdown-item" href="{{ route('career') }}">Karier</a></li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
                </li>
                
                @auth
                <li class="nav-item dropdown ms-2">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <div class="avatar-circle me-2">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="fas fa-user me-2"></i>Profile Saya</a></li>
                        @if(Auth::user()->role === 'admin')
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-cogs me-2"></i>Admin Panel</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item ms-2">
                    <a class="btn btn-warning text-white px-3 py-2" href="{{ route('login') }}" style="background-color: #E0BB20; border: none;">Login</a>
                </li>
                
                <li class="nav-item ms-2">
                    <a class="btn btn-warning text-white px-3 py-2" href="{{ route('register') }}" style="background-color: #841818; border: none;">Daftar</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>