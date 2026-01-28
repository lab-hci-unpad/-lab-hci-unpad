<footer class="bg-dark text-white py-5" style="background: linear-gradient(135deg, #841818 0%, #a52a2a 100%) !important;">
    <div class="container">
        <div class="row g-4">
            <!-- Lab Info -->
            <div class="col-lg-4 col-md-6">
                <div class="mb-4">
                    <img src="{{ asset('assets/img/logo/logo_labhci.png') }}" alt="Lab HCI" height="50" class="mb-3">
                    <h5 class="mb-3" style="font-family: 'Playfair Display', serif;">Lab HCI</h5>
                    <p class="mb-3" style="font-family: 'DM Sans', sans-serif; opacity: 0.9;">Human-Computer Interaction Laboratory<br>Universitas Padjadjaran</p>
                    <p class="mb-4" style="font-family: 'DM Sans', sans-serif; font-size: 0.9rem; opacity: 0.8;">Pusat riset dan inovasi teknologi interaktif berbasis AR/VR untuk kemajuan pendidikan dan industri.</p>
                </div>
                
                <!-- Social Media -->
                <div>
                    <h6 class="mb-3" style="font-family: 'DM Sans', sans-serif; font-weight: 500;">Follow Us</h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white" style="font-size: 1.5rem; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white" style="font-size: 1.5rem; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white" style="font-size: 1.5rem; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white" style="font-size: 1.5rem; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-white" style="font-size: 1.5rem; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="mb-4" style="font-family: 'DM Sans', sans-serif; font-weight: 500;">Tentang Kami</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('about.profile') }}" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Profil Lab</a></li>
                    <li class="mb-2"><a href="{{ route('about.members') }}" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Anggota</a></li>
                    <li class="mb-2"><a href="{{ route('about.facilities') }}" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Fasilitas</a></li>
                </ul>
            </div>
            
            <!-- Research Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="mb-4" style="font-family: 'DM Sans', sans-serif; font-weight: 500;">Research</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('research.topics') }}" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Penelitian</a></li>
                    <li class="mb-2"><a href="{{ route('research.publications') }}" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Publikasi</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Dataset</a></li>
                    <li class="mb-2"><a href="{{ route('collaboration') }}" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Kerja Sama</a></li>
                </ul>
            </div>
            
            <!-- Services Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="mb-4" style="font-family: 'DM Sans', sans-serif; font-weight: 500;">Layanan</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('reservation') }}" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Reservasi Lab</a></li>
                    <li class="mb-2"><a href="{{ route('career') }}" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Karier</a></li>
                    <li class="mb-2"><a href="{{ route('news') }}" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Berita & Acara</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}" class="text-white text-decoration-none" style="font-family: 'DM Sans', sans-serif; opacity: 0.8; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">Kontak</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-2 col-md-12">
                <h6 class="mb-4" style="font-family: 'DM Sans', sans-serif; font-weight: 500;">Kontak</h6>
                <div class="mb-3">
                    <p class="mb-2" style="font-family: 'DM Sans', sans-serif; font-size: 0.9rem; opacity: 0.9;">
                        <i class="fas fa-envelope me-2"></i>
                        <a href="mailto:lab.hci.unpad@gmail.com" class="text-white text-decoration-none" style="opacity: 0.8;">lab.hci.unpad@gmail.com</a>
                    </p>
                    <p class="mb-3" style="font-family: 'DM Sans', sans-serif; font-size: 0.9rem; opacity: 0.9;">
                        <i class="fas fa-envelope me-2"></i>
                        <a href="mailto:mira.suryani@unpad.ac.id" class="text-white text-decoration-none" style="opacity: 0.8;">mira.suryani@unpad.ac.id</a>
                    </p>
                </div>
                
                <div>
                    <p class="mb-0" style="font-family: 'DM Sans', sans-serif; font-size: 0.85rem; opacity: 0.8;">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Gedung D Lt. 2, PPBS<br>
                        Kampus Unpad Jatinangor<br>
                        Jln. Ir. Soekarno km. 21<br>
                        Jatinangor, Sumedang 45363
                    </p>
                </div>
            </div>
        </div>
        
        <hr class="my-4" style="opacity: 0.3;">
        
        <!-- Bottom Footer -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0" style="font-family: 'DM Sans', sans-serif; font-size: 0.9rem; opacity: 0.8;">
                    &copy; {{ date('Y') }} Lab HCI - Universitas Padjadjaran. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end mt-2 mt-md-0">
                <p class="mb-0" style="font-family: 'DM Sans', sans-serif; font-size: 0.9rem; opacity: 0.8;">
                    Developed with <i class="fas fa-heart" style="color: #ff6b6b;"></i> by Lab HCI Team
                </p>
            </div>
        </div>
    </div>
</footer>