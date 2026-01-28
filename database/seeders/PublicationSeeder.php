<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publication;

class PublicationSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        Publication::truncate();
        
        // 2024 Publications
        Publication::create([
            'title' => 'An Initial User Model Design For Adaptive Interface Development In Learning Management System Based On Cognitive Load',
            'authors' => 'Mira Suryani, Dana Indra Sensuse, Harry Budi Santoso, Rizal Fathoni Aji, Setiawan Hadi, Ryan Randy Suryono, Kautsarina',
            'venue' => 'Cognition, Technology, and Work (Q1)',
            'year' => '2024',
            'type' => 'journal',
            'doi' => '10.1007/s10111-024-00772-8'
        ]);

        Publication::create([
            'title' => 'Role, Methodology, and Measurement of Cognitive Load in Computer Science and Information Systems Research',
            'authors' => 'M. Suryani et al.',
            'venue' => 'IEEE Access',
            'year' => '2024',
            'type' => 'journal',
            'volume' => '12',
            'pages' => '190007-190024',
            'doi' => '10.1109/ACCESS.2024.3514355'
        ]);

        // 2021 Publications
        Publication::create([
            'title' => 'Prototipe Sistem Reservasi Daring Dokter Gigi di RSGM Berbasis User Centered Design',
            'authors' => 'Mira Suryani, Arinda Fathya, Dani Rizali Firman, Iwa Rahmat Sunaryo',
            'venue' => 'Jurnal Bisnis, Manajemen, dan Informatika (S5)',
            'year' => '2021',
            'type' => 'journal',
            'volume' => '17',
            'doi' => 'https://doi.org/10.26487/jbmi.v17i3'
        ]);

        Publication::create([
            'title' => 'Development of Historical Learning Media Based on 360 Degrees Virtual Reality of The National Awakening Museum',
            'authors' => 'Mira Suryani, Rispansah Sakti Rusidiawan, Rudi Rosadi',
            'venue' => 'The 1st International Conference on Social Science, Humanity, and Technology 2021 (ICoSSHTech2021)',
            'year' => '2021',
            'type' => 'conference'
        ]);

        // 2020 Publications
        Publication::create([
            'title' => 'Implementation of Design Thinking in Part 30 of The Qur\'an Augmented Reality Based Learning Application to Improve User Experience and Cognitive Ability',
            'authors' => 'Hasna Karimah, Mira Suryani, Akik Hidayat',
            'venue' => 'Regional Conference in Engineering Education (RCEE) 2020',
            'year' => '2020',
            'type' => 'conference'
        ]);

        // 2019 Publications
        Publication::create([
            'title' => 'The Use of Mobile-Assisted Virtual Reality in Fear of Darkness Therapy',
            'authors' => 'Erick Paulus, Mira Suryani, Puspita Adhi Kusuma Wijayanti, Firdaus Perdana Yusuf, Aulia Iskandarsyah',
            'venue' => 'TELKOMNIKA (Q3)',
            'year' => '2019',
            'type' => 'journal',
            'volume' => '17',
            'doi' => '10.12928/telkomnika.v17i1.11614'
        ]);

        Publication::create([
            'title' => 'Development and Evaluation on Night Forest Virtual Reality as Innovative Nyctophobia Treatment',
            'authors' => 'Erick Paulus, Firdaus Perdana Yusuf, Mira Suryani, Ino Suryana',
            'venue' => 'Journal of Physics: Conference Series',
            'year' => '2019',
            'type' => 'journal',
            'volume' => '1235',
            'doi' => '10.1088/1742-6596/1235/1/012003'
        ]);

        Publication::create([
            'title' => 'The Impact of Virtual Reality Simulation on Cognitive Achievement of Nursing Students',
            'authors' => 'Ryan Hara Permana, Mira Suryani, Erick Paulus, Windy Rakhmawati',
            'venue' => 'Indonesian Nursing Journal of Education and Clinic (INJEC) (S3)',
            'year' => '2019',
            'type' => 'journal',
            'volume' => '4',
            'doi' => '10.24990/nject.v4i2.265'
        ]);

        Publication::create([
            'title' => 'Proactive Movement Through Motion Recognition in Game Based Learning for Studying The Sundanese Language',
            'authors' => 'Mira Suryani, Erick Paulus, Ino Suryana',
            'venue' => 'The 1st International Conference on Folklore, Language, Education, and Exhibition (ICOFLEX) 2019',
            'year' => '2019',
            'type' => 'conference'
        ]);

        // 2018 Publications
        Publication::create([
            'title' => 'The Storyboard Development of Virtual Reality Simulation (VRS) of Nursing Care in Respiratory System Disorders Course',
            'authors' => 'Ryan Hara Permana, Mira Suryani, Dian Adiningsih, Erick Paulus',
            'venue' => 'Indonesia Nursing Journal of Education and Clinic (INJEC) (S3)',
            'year' => '2018',
            'type' => 'journal',
            'volume' => '3'
        ]);

        // 2017 Publications
        Publication::create([
            'title' => 'Pengembangan dan Usability Testing Aplikasi Semi-Immersive Virtual Reality untuk Pembelajaran Sejarah',
            'authors' => 'Faizal Imam, Febryani Pertiwi Puteri, Fahmi Surya Nugraha, Eka Qolbu M.S, Mira Suryani, Erick Paulus, Ino Suryana',
            'venue' => 'Seminar Nasional Informatika dan Aplikasinya (SNIA) 2017',
            'year' => '2017',
            'type' => 'conference'
        ]);

        Publication::create([
            'title' => 'EFL Learning Media for Early Childhood Through Speech Recognition Application',
            'authors' => 'Fajar Satria, Hafiz Aditra, Mohammad Dean Aji Wibowo, Mira Suryani, Erick Paulus, Ino Suryana',
            'venue' => '3rd International Conference on Science in Technology (ICSITech 2017)',
            'year' => '2017',
            'type' => 'conference'
        ]);

        Publication::create([
            'title' => 'The Development and Usability Testing of Game-based Learning as A Medium to Introduce Zoology to Young Learners',
            'authors' => 'Gustara Sapto Ajie, M. Azhari Marpaung, Agung Kurniawan, Mira Suryani, Ino Suryana, Erick Paulus',
            'venue' => '3rd International Conference on Science in Technology (ICSITech 2017)',
            'year' => '2017',
            'type' => 'conference'
        ]);

        // 2016 Publications
        Publication::create([
            'title' => 'Evaluasi Usabilitas Pada Aplikasi Virtual Reality untuk Pendidikan: Studi Kasus BIOTALAUTVR',
            'authors' => 'Erick Paulus, Mira Suryani, Riva Farabi',
            'venue' => 'Seminar Nasional Riset Teknologi Informasi (SRITI 2016)',
            'year' => '2016',
            'type' => 'conference'
        ]);

        Publication::create([
            'title' => 'Semi-Immersive Virtual Reality untuk Meningkatkan Motivasi dan Kemampuan Kognitif Siswa dalam Pembelajaran',
            'authors' => 'Mira Suryani, Ino Suryana, Erick Paulus, Riva Farabi',
            'venue' => 'Seminar Nasional Pendidikan Teknik Informatika (SENAPATI 2016)',
            'year' => '2016',
            'type' => 'conference'
        ]);

        // 2015 Publications
        Publication::create([
            'title' => 'Enhancing The Implementation of Cloud-Based Open Learning with E-Learning Personalization',
            'authors' => 'Nungki Selviandro, Mira Suryani, Zainal A. Hasibuan',
            'venue' => '17th International Conference on Advanced Communication Technology (ICACT 2015)',
            'year' => '2015',
            'type' => 'conference'
        ]);

        // 2014 Publications
        Publication::create([
            'title' => 'Open Learning Optimization Based on Cloud Technology: Case Study Implementation in Personalization E-learning',
            'authors' => 'Nungki Selviandro, Mira Suryani, Zainal A. Hasibuan',
            'venue' => 'International Conference on Advanced Communication Technology – ICACT 2014',
            'year' => '2014',
            'type' => 'conference'
        ]);

        Publication::create([
            'title' => 'Personalisasi Konten Pembelajaran Berdasarkan Pendekatan Tipe Belajar Triple-Factor dalam Student Centered E-Learning Environment',
            'authors' => 'Mira Suryani, Harry Budi Santoso, Zainal A. Hasibuan',
            'venue' => 'Konferensi Nasional Sistem Informasi Ke-10',
            'year' => '2014',
            'type' => 'conference'
        ]);

        Publication::create([
            'title' => 'Pengembangan Personalisasi Gaya Belajar pada E-learning dengan Menggunakan Felder Silverman Learning Style Model untuk Sekolah Menengah Atas',
            'authors' => 'Ayi Muhammad Iqbal Nasuha, Mira Suryani',
            'venue' => 'Seminar Nasional Pendidikan Teknik Informatika (SENAPATI 2014)',
            'year' => '2014',
            'type' => 'conference'
        ]);

        Publication::create([
            'title' => 'Learning Content Personalization Based on Triple Factor Learning Type Approach in E-learning',
            'authors' => 'Mira Suryani, Harry Budi Santoso, Zainal A. Hasibuan',
            'venue' => 'International Conference on Advanced Computer Science and Information System (ICACSIS 2014)',
            'year' => '2014',
            'type' => 'conference'
        ]);

        // Books
        Publication::create([
            'title' => 'Desain, Implementasi, & Pengujian Aplikasi Virtual Reality berbasis Unity Game Engine',
            'authors' => 'Erick Paulus, Mira Suryani, dkk',
            'venue' => 'Bitread (PT. Lontar Digital Asia)',
            'year' => '2018',
            'type' => 'book',
            'publisher' => 'Bitread (PT. Lontar Digital Asia)',
            'isbn' => '978-602-5877-60-5'
        ]);

        Publication::create([
            'title' => 'Activity Book Augmented Reality Perjalanan Gigi Berlubang',
            'authors' => 'Dudi Aripin, Anne Agustina Suwargiani, Sri Susilawati, Mira Suryani',
            'venue' => 'Unpad Press',
            'year' => '2023',
            'type' => 'book',
            'publisher' => 'Unpad Press',
            'isbn' => '978-623-352-326-4'
        ]);
    }
}