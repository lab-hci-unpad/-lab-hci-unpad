<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lab HCI - Universitas Padjadjaran')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        /* Navbar Styles */
        .navbar-custom {
            transition: all 0.3s ease;
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        
        .navbar-transparent {
            background-color: transparent !important;
            backdrop-filter: none;
        }
        
        .navbar-solid {
            background-color: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            font-size: 1.5rem;
            color: white !important;
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 0.5rem;
            color: white !important;
        }
        
        .navbar-solid .navbar-brand {
            color: #2c3e50 !important;
        }
        
        .navbar-solid .nav-link {
            color: #2c3e50 !important;
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
        }
        
        /* Hero Section */
        .hero-section {
            height: 100vh;
            background: url('{{ asset('assets/img/hero/hero-bg.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            color: white;
        }
        
        .hero-section-small {
            height: 100vh;
            background: url('{{ asset('assets/img/hero/hero-bg.png') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            color: white;
            margin-bottom: 0;
        }
        
        /* Custom Styles */
        body {
            font-family: 'DM Sans', sans-serif;
            font-weight: 400;
            padding-top: 0;
        }
        
        /* Typography */
        h1, h2, h3, h4, h5, h6, .display-1, .display-2, .display-3, .display-4, .display-5, .display-6 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }
        
        .lead, .navbar-brand {
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
        }
        
        p, .card-text, .text-muted, .btn {
            font-family: 'DM Sans', sans-serif;
            font-weight: 400;
        }
        
        .hero-section {
            margin-top: 0;
        }
        
        .non-hero-page {
            padding-top: 80px;
        }
        
        .section-padding {
            padding: 80px 0;
        }
        
        /* Lab HCI Theme Colors */
        :root {
            --primary-color: #841818;
            --secondary-color: #a52a2a;
            --accent-color: #2c3e50;
            --light-color: #ffffff;
        }
        
        .text-primary-custom {
            color: var(--primary-color) !important;
        }
        
        .bg-primary-custom {
            background-color: var(--primary-color) !important;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        /* Avatar Circle */
        .avatar-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    @include('user.partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('user.partials.footer')
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Navbar Scroll Effect -->
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-custom');
            if (window.scrollY > 50) {
                navbar.classList.remove('navbar-transparent');
                navbar.classList.add('navbar-solid');
            } else {
                navbar.classList.remove('navbar-solid');
                navbar.classList.add('navbar-transparent');
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>