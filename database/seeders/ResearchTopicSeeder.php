<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResearchTopic;

class ResearchTopicSeeder extends Seeder
{
    public function run(): void
    {
        $topics = [
            'Adaptive User Interface',
            'Augmented Reality',
            'Learning Analytics',
            'Learning Personalization',
            'Usability Evaluation',
            'User Experience/User Interface',
            'Virtual Reality',
            'Technology Enhance Learning'
        ];

        foreach ($topics as $topic) {
            ResearchTopic::create([
                'name' => $topic,
                'slug' => strtolower(str_replace(['/', ' '], ['-', '-'], $topic)),
                'is_active' => true
            ]);
        }
    }
}