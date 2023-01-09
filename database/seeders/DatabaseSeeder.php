<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \App\Models\User;
use \App\Models\Ingredient;
use \App\Models\Item;
use \App\Models\Combo;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Validation\Rules\In;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)->create();

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

         $combos = Combo::factory(50)->create();

         Item::factory(150)->create();

         $ingredients = Ingredient::factory(300)->create();

         foreach (Item::all() as $item){
             for ($i = 0; $i < rand(3, 6); $i++) {
                 $item->ingredient()->attach(Ingredient::all()->random(), ['amount' => fake()->numberBetween(1, 10)]);
             }
         }

        foreach (Combo::all() as $combo){
            for ($i = 0; $i < rand(3, 6); $i++) {
                $combo->item()->attach(Item::all()->random(), ['amount' => fake()->numberBetween(1, 3)]);
            }
        }
    }
}
