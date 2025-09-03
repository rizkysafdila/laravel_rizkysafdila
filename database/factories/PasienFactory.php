<?php

namespace Database\Factories;

use App\Models\RumahSakit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pasien'    => $this->faker->name,
            'alamat'         => $this->faker->address,
            'no_telpon'      => $this->faker->numerify('08#########'),
            'rumah_sakit_id' => RumahSakit::inRandomOrder()->first()?->id ?? RumahSakit::factory(),
        ];
    }
}
