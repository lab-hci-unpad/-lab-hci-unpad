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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Typography */
        body {
            font-family: 'DM Sans', sans-serif;
        }
        
        h1, h2, h3, h4, h5, h6, .display-1, .display-2, .display-3, .display-4, .display-5, .display-6 {
            font-family: 'Playfair Display', serif;
        }
        
        .fw-medium {
            font-weight: 500;
        }
        /* Navbar Styles */
        .navbar-custom {
            transition: all 0.3s ease;
            padding: 1rem 0;
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
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: #841818 !important;
        }
        
        .dropdown-item {
            color: #212529 !important;
        }
        
        .dropdown-item:hover {
            background-color: #841818 !important;
            color: white !important;
        }
        
        .dropdown-item:active,
        .dropdown-item.active {
            background-color: #841818 !important;
            color: white !important;
        }
        
        .dropdown-item:focus {
            background-color: #841818 !important;
            color: white !important;
        }
        
        .dropdown-item:visited {
            background-color: #841818 !important;
            color: white !important;
        }
        
        .dropdown-menu .dropdown-item:not(:hover):not(:focus):not(:active) {
            background-color: transparent !important;
            color: #212529 !important;
        }
        
        /* Hero Section */
        .hero-section {
            height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            color: white;
        }
        
        /* Custom Styles */
        .fw-medium {
            font-weight: 500;
        }
        
        .section-padding {
            padding: 80px 0;
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