<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SafeExam;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => '$2y$12$kPgMZ8H33vcLyh7ICJKkr.CReGwe28EjiYz0ayScPZ.tv3Gg.htxG',   // 12345Abcde
            'email_verified_at' => now(),
        ]);
    }
}
