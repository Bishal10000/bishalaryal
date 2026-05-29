<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'bishalaryal975@gmail.com'],
            [
                'name' => 'Bishal Aryal',
                'password' => 'Bishal@10',
                'bio' => 'I write about the intersection of design, engineering, and editorial storytelling for modern web experiences.',
                'role' => 'Admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
