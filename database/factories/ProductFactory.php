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
    public function definition(): array
    {
        return [
//            'name' => $this->faker->name,
//            'cost' => round($this->faker->numberBetween(100, 1000), -1),
//            'description' => $this->faker->sentences(2, true),
//            'calories' => round($this->faker->numberBetween(200, 600), -1),
//            'created_at' => $this->faker->dateTimeBetween('-2 years'),
//            'image' => $this->faker->imageUrl(),

                   'name' => "name1",
                   'cost' => 34,
                   'description' => 'asddfadf',
                   'calories' => 444,



        ];
    }
}
