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
        $width=300;
        $height=400;
        $path=$this->faker->image('storage/produits',$width,$height,'product',true,true,'product',false);
        return [
            "reference"=>$this->faker->sentence(),
            "designation"=>$this->faker->text(),
            "quantite"=>$this->faker->numberBetween(4,20),
            "photo"=>$path,
            "prix"=>$this->faker->numberBetween(20,2000),
        ];
    }
}
