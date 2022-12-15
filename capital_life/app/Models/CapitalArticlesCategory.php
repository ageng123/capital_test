<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitalArticlesCategory extends Model
{
    use HasFactory;
    protected $table = 'capital_articles_category';
    protected $primaryKey = 'cac_id';
    protected $guarded = [];
    public function category_detail(){
        return $this->hasOne(\App\Models\CapitalCategories::class, 'category_id', 'capital_category_id');
    }
}
