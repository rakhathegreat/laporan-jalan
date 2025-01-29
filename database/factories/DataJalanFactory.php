<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DataJalanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'lebar' => fake()->numberBetween(1, 10), 
            'panjang' => fake()->numberBetween(500, 2000), 
            'kondisi' => fake()->randomElement(['Baik', 'Rusak', 'Rusak Berat']),
            'rt' => fake()->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'rw' => fake()->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']), 
            'kelurahan' => fake()->randomElement(['Balokang', 'Cibeureum', 'Jajawar', 'Neglasari', 'Banjar', 'Mekarsari', 'Situbatu']),
            'koordinat' => fake()->latitude() . ',' . fake()->longitude(),
            'keterangan' => fake()->sentence(),
        ];
    }
}
