<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CapitalCategories>
 */
class CapitalCategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\CapitalCategories::class;
    public function definition()
    {
        $faker = new Faker;
        return [
            //
            'category_name' => fake()->unique()->word(),
            'category_description' => fake()->sentence(),
            'category_active' => rand(0,1)

        ];
    }
}
