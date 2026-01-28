<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Lab HCI',
            'email' => 'admin@labhci.unpad.ac.id',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'nim' => null,
        ]);
    }
}
