<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Menu::class;
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Espresso', 'Cappuccino', 'Latte', 'Mocha', 'Americano', 'Macchiato', 'Flat White', 'Affogato', 'Ristretto', 'Doppio', 'Long Black', 'Irish Coffee', 'Turkish Coffee', 'Vienna Coffee', 'Cortado', 'Breve', 'Frappuccino', 'Pour Over', 'Chemex', 'Vietnamese Coffee']),
            'size' => fake()->randomElement(['Small', 'Medium', 'Large']),
            'temperature' => fake()->randomElement(['Hot', 'Cold']),
            'price' => fake()->randomNumber(5, true),
        ];
    }
}
