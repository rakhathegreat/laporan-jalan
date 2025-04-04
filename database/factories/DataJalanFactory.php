<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DataJalan;
use App\Models\KondisiJalan;
use App\Models\Alamat;
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
    protected $model = DataJalan::class;

    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'nama' => fake()->name(),
            'lebar' => fake()->numberBetween(1, 10), 
            'panjang' => fake()->numberBetween(500, 2000), 
            'kondisi_jalan_id' => fake()->numberBetween(1, 3),
            'alamat_id' => Alamat::factory()->create()->id,
            'keterangan' => fake()->sentence(),
        ];
    }
}
