<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "reference"=>$this->faker->sentence(),
            "designation"=>$this->faker->text(),
            "quantite"=>$this->faker->numberBetween(4,20),
            "prix"=>$this->faker->numberBetween(20,2000),
        ];
    }
}
