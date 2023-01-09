<?php

namespace Database\Factories;
use \Illuminate\Database\Eloquent\Factories\Factory;
class ComboFactory extends Factory
{

    /**
     * @inheritDoc
     */
    public function definition()
    {
        return [
        "name" => fake()->name()
        ];
    }
}
