<?php

namespace Database\Seeders;

use App\Models\Nhacsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhacsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nhacsi::factory(10)->create();
    }
}
