<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CapitalArticlesCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\CapitalArticlesCategory::class;
    protected $timestamps = false;
    public function definition()
    {
        $articles = \App\Models\CapitalArticles::inRandomOrder()->first();
        $category = \App\Models\CapitalCategories::inRandomOrder()->first();
        return [
            //
            'capital_articles_id' => $articles->id,
            'capital_category_id' => $category->category_id
        ];
    }
}
