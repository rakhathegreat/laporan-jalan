<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KondisiJalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kondisi' => 'Baik', 'deskripsi' => 'Jalan yang baik dan layak digunakan.'],
            ['kondisi' => 'Rusak', 'deskripsi' => 'Jalan yang rusak dan tidak layak digunakan.'],
            ['kondisi' => 'Rusak Berat', 'deskripsi' => 'Jalan yang sangat rusak dan tidak layak digunakan.'],
        ];

        foreach ($data as $item) {
            \App\Models\KondisiJalan::create($item);
        }
    }
}
