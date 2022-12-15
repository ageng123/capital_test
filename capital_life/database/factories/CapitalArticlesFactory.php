<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{User, CapitalArticles, CapitalCategories};
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CapitalArticles>
 */
class CapitalArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CapitalArticles::class;
    public function definition()
    {
        $user = \App\Models\User::inRandomOrder()->first();
        return [
            //
            'title' => fake()->sentence,
            'body' => fake()->paragraph,
            'uid' => $user->id,
            'articles_point_type' => rand(1,3),
            'image' => fake()->imageUrl(),
            'slug' => fake()->slug()
        ];
    }
}
