<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitalCategories extends Model
{
    use HasFactory;
    protected $table = 'capital_categories';
    protected $primaryKey = 'category_id';
    protected $guarded = [];
}
