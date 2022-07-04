<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName(),
            'pictures' => $this->faker->imageUrl($width = 640, $height = 480),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 999),
            'description' => $this->faker->realText(100,2),
            'category' => $this->faker->randomElement($array = array ('Games','Muziek','Voertuigen', 'Boeken', 'Sport', 'Tuin', 'Verzamelen', 'Kleding', 'Elektronische apparatuur')),
            'sold' => $this->faker->boolean($chanceOfGettingTrue = 10)
        ];
    }
}
