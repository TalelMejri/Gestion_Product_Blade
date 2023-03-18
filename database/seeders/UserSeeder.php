<?php

namespace Database\Seeders;

use App\Models\Produit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(4)->has(Produit::factory()->count(3)
                ->state(new Sequence(
                    ["quantite"=>4],
                    ["quantite"=>8],
                    ["quantite"=>7],
                    ))
                 ->state(new Sequence(
                    ["prix"=>4.5],
                    ["prix"=>85.5],
                    ["prix"=>222.5],
                 ))
            )->create();
    }
}
