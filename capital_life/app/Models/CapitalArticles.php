<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitalArticles extends Model
{
    use HasFactory;
    protected $table = 'capital_articles';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function category(){
        return $this->hasMany(\App\Models\CapitalArticlesCategory::class, 'capital_articles_id', 'id');
    }
    public function author(){
        return $this->hasOne(\App\Models\User::class, 'id', 'uid');
    }
    public function getPointTypeAttribute(){
        $point_type = [1 => 'one-time', 2 => 'repeated', 3 => 'repeated'];
        return $point_type[$this->articles_point_type];
        
    }
}
