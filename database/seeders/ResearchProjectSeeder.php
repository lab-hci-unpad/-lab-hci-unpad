<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResearchProject;

class ResearchProjectSeeder extends Seeder
{
    public function run(): void
    {
        ResearchProject::create([
            'title' => 'User Experience (UX) Evaluation of AI-Based ChatBot (Generative AI) towards a Proposed Design for Supporting Students\' Learning Skills in Online Learning Context',
            'funding_source' => 'Hibah Internal UI – PUTI Q1',
            'year' => '2024-2025',
            'status' => 'ongoing'
        ]);

        ResearchProject::create([
            'title' => 'Adaptive User Interface Based on Multimodal Cognitive Load Measurement in Learning Management System',
            'funding_source' => 'Hibah Internal UI – PUTI Q1',
            'year' => '2023-2024',
            'status' => 'completed'
        ]);

        ResearchProject::create([
            'title' => 'Pengembangan Application Mobile Health Deteksi Dini dan Pencegahan Stunting dalam Upaya Meningkatkan Kualitas Hidup Anak Indonesia',
            'funding_source' => 'Hibah PTUPT DIKTI 2021',
            'year' => '2021',
            'status' => 'completed'
        ]);
    }
}