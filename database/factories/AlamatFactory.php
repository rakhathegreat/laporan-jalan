<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alamat>
 */
class AlamatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'kelurahan' => fake()->randomElement(['Banjar', 'Balokang', 'Jajawar', 'Neglasari', 'Mekarsari', 'Situbatu', 'Cibeureum']),
            'rt' => fake()->numberBetween(1, 10),
            'rw' => fake()->numberBetween(1, 10),
        ];
    }
}
