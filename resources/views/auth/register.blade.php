<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Lab HCI</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            height: 100vh;
            overflow: hidden;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }
        
        .fw-medium {
            font-weight: 500;
        }
        
        .auth-container {
            height: 100vh;
        }
        
        .auth-left {
            background: url('{{ asset('assets/img/side.png') }}') center/cover no-repeat;
            position: relative;
        }
        
        .auth-right {
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-y: auto;
        }
        
        .auth-form {
            width: 100%;
            max-width: 550px;
            padding: 3rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #841818, #a01d1d);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(132, 24, 24, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #6d1414, #841818);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(132, 24, 24, 0.4);
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }
        
        .form-control:focus {
            border-color: #841818;
            box-shadow: 0 0 0 0.2rem rgba(132, 24, 24, 0.15);
            background: white;
        }
        
        .input-group-text {
            background: transparent;
            color: #841818;
            border: 2px solid #e9ecef;
            border-radius: 12px 0 0 12px;
        }
        
        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }
        
        .nav-pills .nav-link {
            border: none;
            border-bottom: 3px solid transparent;
            border-radius: 0;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            background: transparent;
        }
        
        .nav-pills .nav-link.active {
            background: transparent;
            color: #841818;
            border-bottom: 3px solid #841818;
            box-shadow: none;
        }
        
        .nav-pills .nav-link:not(.active) {
            color: #6c757d;
            background: transparent;
        }
        
        .nav-pills .nav-link:not(.active):hover {
            background: transparent;
            color: #841818;
            border-bottom: 3px solid rgba(132, 24, 24, 0.3);
        }
        
        .form-check-input:checked {
            background-color: #841818;
            border-color: #841818;
        }
        
        .form-check-input:focus {
            border-color: #841818;
            box-shadow: 0 0 0 0.25rem rgba(132, 24, 24, 0.25);
        }
        
        .form-select {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }
        
        .form-select:focus {
            border-color: #841818;
            box-shadow: 0 0 0 0.2rem rgba(132, 24, 24, 0.15);
            background: white;
        }
        
        .back-link {
            position: absolute;
            top: 2rem;
            right: 2rem;
            color: white;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link:hover {
            color: #f8f9fa;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            z-index: 10;
        }
        
        .password-toggle:hover {
            color: #841818;
        }
        
        .password-field {
            position: relative;
        }
    </style>
</head>
<body>
    <div class="container-fluid auth-container">
        <div class="row h-100">
            <!-- Left Side - Image -->
            <div class="col-lg-6 auth-left">
                <a href="{{ route('home') }}" class="back-link">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Website
                </a>
                
                <div class="overlay-content">
                    <div class="text-white p-4" style="position: absolute; bottom: 2rem; left: 2rem; right: 2rem;">
                        <h2 class="fw-bold mb-3">Bergabung dengan Lab HCI</h2>
                        <p class="mb-2">Human-Computer Interaction Laboratory</p>
                        <p class="mb-0">Universitas Padjadjaran</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Form -->
            <div class="col-lg-6 auth-right">
                <div class="auth-form">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Buat Akun Baru</h2>
                        <p class="text-muted">Silakan daftar untuk mengakses sistem Lab HCI</p>
                    </div>
                    
                    <div class="mb-3 text-center">
                        <ul class="nav nav-pills justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fas fa-sign-in-alt me-2"></i>Masuk
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('register') }}">
                                    <i class="fas fa-user-plus me-2"></i>Daftar
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group password-field">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                                <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                    <i class="fas fa-eye" id="password-eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <div class="input-group password-field">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password" required>
                                <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                                    <i class="fas fa-eye" id="password_confirmation-eye"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                Saya setuju dengan <a href="#" style="color: #841818;">syarat dan ketentuan</a>
                            </label>
                        </div>
                        
                        <input type="hidden" name="role" value="mahasiswa">
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-user-plus me-2"></i>DAFTAR
                        </button>
                        
                        <div class="text-center">
                            <p class="mb-2">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none" style="color: #841818;">Masuk di sini</a></p>
                            <p class="mb-0">Atau daftar dengan</p>
                        </div>
                        
                        <button type="button" class="btn btn-outline-secondary w-100 mt-2" onclick="window.location.href='{{ route('auth.google') }}'">
                            <i class="fab fa-google me-2"></i>Daftar dengan Google
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eye = document.getElementById(fieldId + '-eye');
            
            if (field.type === 'password') {
                field.type = 'text';
                eye.classList.remove('fa-eye');
                eye.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                eye.classList.remove('fa-eye-slash');
                eye.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>