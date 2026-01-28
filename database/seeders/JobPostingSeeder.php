<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobPosting;

class JobPostingSeeder extends Seeder
{
    public function run(): void
    {
        JobPosting::create([
            'title' => 'Asisten Praktikum MK IMK',
            'description' => 'Bergabunglah dengan Lab HCI dan dapatkan pengalaman berharga dalam bidang Human-Computer Interaction, teknologi AR/VR, dan multimedia production.',
            'quota' => 2,
            'qualifications' => [
                'Mahasiswa Prodi Teknik Informatika, Unpad',
                'Sudah pernah mengambil MK IMK dengan nilai A',
                'Berkomitmen untuk membantu pelaksanaan praktikum HCI terutama dalam pengembangan project AR dan VR',
                'Mampu menggunakan perangkat rekaman studio untuk kebutuhan perekaman profil lab',
                'Mampu menggunakan aplikasi editing multimedia'
            ],
            'status' => 'active',
            'deadline' => null
        ]);
    }
}