<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    //
    protected $point = [];
    public function index()
    {
        return view('landing.dashboard');
    }
    public function article()
    {
        return view('landing.read-article');
    }
    public function get_point(){
        $date = new \DateTime();
        $date->modify('+'.rand(0,30).'days');
        $this->point = [
            'point' => rand(0, (10000*10000)),
            'expired' => $date->format('Y-m-d H:i:s')
        ];
        $this->point['conversion'] = $this->point['point'] * 0.002;
        $this->point['canWithDraw'] = false;

        if($this->point['conversion'] > 100000){
            $this->point['canWithDraw'] = true;
        }
        array_walk_recursive($this->point, [$this, 'formatRupiahFromArray']);
        return ['data' => $this->point];
    }
    private function formatRupiahFromArray($value, $key){
        if(is_float($value) || is_int($value)){
            
            $this->point[$key] = number_format($value,0, ',', '.');
        }
    }
    public function store(){

    }
    public function delete()
    {

    }
    public function get(){

    }
}
