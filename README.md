# Lab HCI Unpad

Website Lab HCI (Human-Computer Interaction) Universitas Padjadjaran.

## Apa ini?

Website buat ngelola semua hal yang berhubungan sama Lab HCI Unpad - dari penelitian, publikasi, berita, galeri kegiatan, info lowongan kerja, sampe booking fasilitas lab.

## Fitur

### Halaman Publik
- Home - berita terbaru
- About - profil lab, tim, fasilitas
- Research - topik penelitian & publikasi
- Gallery - foto-foto kegiatan
- News - berita & artikel
- Career - lowongan kerja & magang
- Dataset - dataset penelitian
- Reservation - booking fasilitas
- Collaboration - info kerjasama
- Contact - kontak & lokasi

### Login
- Bisa daftar manual atau login pake Google
- Ada 2 role: Admin & User biasa

### Admin
Bisa manage:
- Berita
- Galeri
- Lowongan kerja
- Topik penelitian
- Publikasi
- Project penelitian
- User

### User Biasa
- Edit profil
- Liat history aktivitas

## Teknologi

- Laravel 12
- PHP 8.2+
- MySQL
- Bootstrap 5 + Font Awesome
- Google OAuth (Laravel Socialite)
- Font: Playfair Display & DM Sans

## Cara Install

### Yang Dibutuhin
- PHP 8.2 ke atas
- Composer
- MySQL atau MariaDB
- Node.js & NPM

### Install

1. Clone repository
```bash
git clone <repository-url>
cd -lab-hci-unpad
```

2. Install dependencies
```bash
composer install
npm install
```

3. Setup environment
```bash
copy .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Konfigurasi database di file `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

6. Buat database
```bash
mysql -u root -e "CREATE DATABASE laravel"
```

7. Jalankan migrasi dan seeder
```bash
php artisan migrate --seed
```

8. Build assets
```bash
npm run build
```

9. Jalankan server
```bash
php artisan serve
```

Buka browser ke `http://127.0.0.1:8000`

## Akun Testing

Abis run seeder, bisa login pake:

**Admin**
- Email: admin@labhci.unpad.ac.id
- Password: password

## Database

Tabel yang ada:
- `users` - data user (admin & user biasa)
- `news` - berita & artikel
- `gallery` - foto kegiatan
- `job_postings` - lowongan kerja
- `research_topics` - topik penelitian
- `research_projects` - project penelitian
- `publications` - publikasi

## Development

Jalanin server:
```bash
php artisan serve
```

Compile assets (development):
```bash
npm run dev
```

Compile assets (production):
```bash
npm run build
```

Run tests:
```bash
php artisan test
```

## Struktur Folder

```
├── app/
│   ├── Http/Controllers/     # controller
│   └── Models/               # model
├── database/
│   ├── migrations/           # migrasi database
│   └── seeders/              # seeder
├── public/
│   └── assets/               # gambar, css, js public
├── resources/
│   ├── views/
│   │   ├── admin/           # view admin
│   │   ├── auth/            # view login/register
│   │   └── user/            # view user
│   ├── css/                 # file css
│   └── js/                  # file js
└── routes/
    └── web.php              # routing
```

## License

MIT
