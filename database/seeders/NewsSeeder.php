<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        News::truncate();
        
        News::create([
            'title' => 'Alat Laboratorium Komputer 2020',
            'slug' => 'alat-laboratorium-komputer-2020',
            'excerpt' => 'Departemen Ilmu Komputer telah menerima barang untuk keperluan laboratorium AR-VR dan Laboratorium HPC, dari pengajuan tahun 2019.',
            'content' => 'Pada tanggal 30 Januari tahun 2020 Departemen Ilmu Komputer telah menerima barang untuk keperluan laboratorium AR-VR dan Laboratorium HPC, dari pengajuan tahun 2019. Peralatan-peralatan tersebut adalah (1) Dua unit HPC Asus ROG dilengkapi monitor 27″ LED, (2) Dua unit Oculus Quest 128GB, (3) dua unit Oculus Rift 64GB, (4) 2 unit HTC VIVE Virtual Reality dan (5) lima unit smartphone. Belum semua alat-alat lab yang diajukan telah dipenuhi dan itu diajukan lagi pada tahun 2020, masing-masing untuk Laboratorium Jaringan (Huawei) dan alat-alat pendukung semua lab yang ada. Mudah-mudahan peralatan ini dapat dimanfaatkan maksimal untuk mahasiswa praktek, berkreasi dan berinovasi mendukung pendidikan mereka di Unpad.',
            'featured_image' => 'assets/img/berita/alat/img1.jpg',
            'gallery_images' => [
                'assets/img/berita/alat/img2.jpg',
                'assets/img/berita/alat/img3.jpg',
                'assets/img/berita/alat/img4.jpg',
                'assets/img/berita/alat/img5.jpg'
            ],
            'published_at' => '2020-01-30 10:00:00',
            'status' => 'published'
        ]);

        News::create([
            'title' => 'Uji Coba Permainan Pendidikan berbasis Virtual Reality',
            'slug' => 'uji-coba-permainan-pendidikan-berbasis-virtual-reality',
            'excerpt' => 'Tim Peneliti bidang Human Computer Interaction, Lab RAID, Departemen Ilmu Komputer Unpad melakukan uji coba aplikasi BiotaLautVR kepada siswa/siswi MTs Ma\'Arif dan SMP Muhamadiyah Jatinangor.',
            'content' => 'Teknologi dan media memiliki peranan penting dalam pendidikan diantaranya adalah teknologi Virtual Reality dan Augmented Reality. Berbagai macam penelitian telah dilakukan untuk menguji tingkat usabilitas teknologi tersebut terhadap dunia pendidikan. Teknologi tersebut mampu menghadirkan replikasi kondisi nyata ke dalam lingkungan maya, sehingga pengguna mampu berinteraksi dengan lingkungan tersebut. Tim Peneliti bidang Human Computer Interaction, Lab RAID, Departemen Ilmu Komputer Unpad melakukan uji coba aplikasi BiotaLautVR kepada siswa/siswi MTs Ma\'Arif dan SMP Muhamadiyah Jatinangor untuk melihat dampak teknologi VR terhadap motivasi belajar siswa. Respon positif dari siswa, guru dan kepala sekolah menjadi bekal untuk penelitian selanjutnya. Tim Peneliti : Erick Paulus, M.Kom, Mira Suryani, M.Kom, dan Riva Farabi.',
            'featured_image' => 'assets/img/berita/kedua/gambar 1.jpg',
            'gallery_images' => [
                'assets/img/berita/kedua/gambar 2.png'
            ],
            'published_at' => '2019-06-15 14:00:00',
            'status' => 'published'
        ]);

        News::create([
            'title' => 'Pengabdian pada Masyarakat ARKADA',
            'slug' => 'pengabdian-pada-masyarakat-arkada',
            'excerpt' => 'Kegiatan Pengabdian pada Masyarakat Berbasis Riset ARKADA yang dilakukan secara daring di SMP Al Ma\'soem Jatinangor dengan aplikasi mobile Android untuk belajar aksara Sunda.',
            'content' => 'Pada tanggal 5 Juni 2021 telah diadakan kegiatan Pengabdian pada Masyarakat Berbasis Riset ARKADA yang dilakukan secara daring. Acara diikuti oleh para Dosen Departemen Ilmu Komputer serta undangan lainnya. Tempat pengabdian adalah SMP Al Ma\'soem Jatinangor bersama dengan guru dan kepala sekolahnya. ARKADA merupakan aplikasi mobile Android untuk belajar aksara Sunda. Proses belajar tidak hanya dilakukan secara biasa, namun diberikan sentuhan inovasi berupa permainan (game) dan dibalut dengan teknologi terkini yaitu Augmented Reality atau Realitas Tertambah. Target dari Pengabdian pada Masyarakat ini sebagai bagian dari implementasi riset AMIRA, juga bisa memberikan pemahaman tentang aksara Sunda sekaligus juga mengharapkan tumbuhnya minat akan budaya lokal yang saat ini semakin luntur. Aplikasi ARKADA dapat diunduh pada link ini. Berikut beberapa gambar kegiatan tersebut.',
            'featured_image' => 'assets/img/berita/ketiga/1.jpg',
            'gallery_images' => [
                'assets/img/berita/ketiga/2.png',
                'assets/img/berita/ketiga/3.png',
                'assets/img/berita/ketiga/4.png'
            ],
            'published_at' => '2021-06-05 10:00:00',
            'status' => 'published'
        ]);
    }
}