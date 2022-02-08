<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


class PaketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_outlet' => $this->faker->numberBetween(1,25),
            'jenis' => $this->faker->randomElement(['kiloan','selimut','bed_cover','kaos','lain']),
            'nama_paket' => $this->faker->sentence(2),
            'harga' => $this->faker->numberBetween(10000,250000)
        ];
    }
}
