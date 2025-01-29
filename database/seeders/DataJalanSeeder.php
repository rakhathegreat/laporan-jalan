<?php

namespace Database\Seeders;

use App\Models\DataJalan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataJalanSeeder extends Seeder
{
    /*
     * Run the database seeds.
     */
    public function run(): void
    {
        DataJalan::factory(500)->create();
    }
}
