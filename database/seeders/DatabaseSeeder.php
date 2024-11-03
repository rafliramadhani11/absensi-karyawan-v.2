<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Position;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Position::factory()->create(['name' => 'Kepala Divisi']);
        Position::factory()->create(['name' => 'Anggota']);
        Division::factory(5)->create();
        User::factory(10)->create();
    }
}
