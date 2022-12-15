<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersPointHistories extends Model
{
    use HasFactory;
    protected $table = 'users_point_histories';
    protected $primaryKey = 'uph_id';
    protected $guarded = [];
    public function getWithdrawStatusTextAttribute(){
        if($this->withdraw_status == ''){
            return 'unknown';
        }
        $data = [1 => '<span class="badge bg-info rounded shadow">Pending</span>', 2 => '<span class="badge bg-success rounded shadow">Success</span>', 3 => '<span class="badge bg-danger rounded shadow">Failed</span>'];
        return $data[$this->withdraw_status];
    }
    public function article(){
        return $this->hasOne(\App\Models\CapitalArticles::class, 'id', 'articles_id');
    }
}
