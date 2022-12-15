<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{CapitalArticles,CapitalCategories, CapitalArticlesCategory};
class CapitalArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        return CapitalCategories::factory()->count(50)->create()->each(function($category){
            CapitalArticles::factory()->create();
        });
    }
}
