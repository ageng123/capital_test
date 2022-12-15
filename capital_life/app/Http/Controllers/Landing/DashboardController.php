<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\{CapitalArticles, UsersPointHistories, User, UserDetail, UserPoint};
use App\Http\Requests\{WithdrawRequest, RegisterRequest};
use DB;
use Illuminate\Http\Response;
use Hash;
class DashboardController extends Controller
{
    //
    protected $point = [];
    protected $user;
    public function __construct(){
    }
    public function index()
    {
        $user = [];
        if(Auth::check()){
            $user = Auth::user()->load(['user_detail', 'user_point']);
        }
        $articles = CapitalArticles::query()->orderBy('updated_at', 'desc')->take(4)->with(['category', 'category.category_detail'])->get();

        return view('landing.dashboard')->with(['data' => $user, 'artikel' => $articles]);
    }
    public function index_guess(){
        $user = [];
        if(Auth::check()){
            $user = Auth::user()->load(['user_detail', 'user_point']);
        }
        $articles = CapitalArticles::query()->orderBy('updated_at', 'desc')->take(4)->get();

        return view('landing.index')->with(['data' => $user, 'artikel' => $articles]);
    }
    //Single Article
    public function article($slug)
    {
        $user = Auth::user()->load(['user_detail', 'user_point']);
        $articles = CapitalArticles::where(['slug' => $slug])->first();
        if(empty($articles)){
            return redirect()->route('home');
        }
        $gainPoint = true;
        $gainPoint = $this->checkCanGainPoint($gainPoint, $articles, $user->id);
        
        return view('landing.read-article')->with(['user' => $user, 'articles' => $articles, 'gain_point' => $gainPoint]);
    }
    public function readed_article($slug)
    {
        $user = [];
        if(Auth::check()){
            $user = Auth::user()->load(['user_detail', 'user_point']);

        }
        $articles = CapitalArticles::where(['slug' => $slug])->first();
        if(empty($articles)){
            return redirect()->route('home');
        }
        $gainPoint = false;
        
        return view('landing.read-article')->with(['user' => $user, 'articles' => $articles, 'gain_point' => $gainPoint]);
    }
    private function checkCanGainPoint(&$gainPoint,$articles, $uid){
        if($articles->articles_point_type == 1){
            $checkHistories = UsersPointHistories::where(['uid' => $uid, 'articles_id' => $articles->id, 'history_type' => 1])->first();
            if(!empty($checkHistories)){
                $gainPoint = false;
                return $gainPoint;
            }
        }
        $gainPoint = true;
        return $gainPoint;
    }
    public function storePoint(CapitalArticles $articles){
        $user = Auth::user()->load(['user_detail', 'user_point']);
        $checkHistories = UsersPointHistories::where(['uid' => $user->id, 'articles_id' => $articles->id, 'history_type' => 1])->first();
        if(!empty($checkHistories) && $articles->articles_point_type == 1){
            throw new \Exception('You already gained point for this article');
        }
        $transaction = DB::transaction(function()use($articles, $user){
            $pointHistories = new UsersPointHistories;
            $currentPoint = UserPoint::where(['uid' => $user->id])->first();
            $historyType = 1;
            $currentPoint->point += 15;
            $save = $currentPoint->save();
            if(!$save){
                DB::rollback();
                return false;
            }
            $pointHistories->point_amount = 15;
            $pointHistories->uid = $user->id;
            $pointHistories->history_type = $historyType;
            $pointHistories->articles_id = $articles->id;
            $save = $pointHistories->save();
            if(!$save){
                DB::rollback();
                return false;
            }
            DB::commit();
            return true;
        });
        if($transaction){
            return response()->json(['message' => 'Selamat ! Anda Berhasil Mendapatkan Point !', 'success' => true, 'returnurl' => route('logged_in.readed_article', ['slug' => $articles->slug])], 200);
        }
        throw new \Exception("Gagal Mendapatkan Point !");
    }
    //List Article
    public function articles()
    {
        $user = Auth::user()->load(['user_detail', 'user_point']);
        $articles = CapitalArticles::query()->orderBy('updated_at', 'desc')->limit(8)->offset(8)->get();
        $repeated = CapitalArticles::query()->orderBy('updated_at', 'desc')->where('articles_point_type', '1', '!=')->limit(8)->offset(8)->get();
        $oneTime = CapitalArticles::query()->orderBy('updated_at', 'desc')->where('articles_point_type', '1', '=')->limit(8)->offset(8)->get();

        return view('landing.articles')->with(['user' => $user, 'articles' => $articles, 'oneTime' => $oneTime, 'repeated' => $repeated]);
    }
    public function get_point(){
        $date = new \DateTime();
        $date->modify('+'.rand(0,30).'days');
        $user =  Auth::user()->load(['user_detail', 'user_point']);;
        $this->point['user'] = $user;
        $this->point['point'] = $user->user_point->point;
        $this->point['expired'] = $user->user_point->expired;

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
    public function withdraw(){
        $historyWithdraw = UsersPointHistories::where(['uid' => Auth::user()->id, 'history_type' => 2])->get();
        $pointGained = UsersPointHistories::where(['uid' => Auth::user()->id, 'history_type' => 1])->get();
        $user = Auth::user()->load(['user_detail', 'user_point']);
        $data = [
            'point_conversion_rate_value' => 0.002,
            'history' => $historyWithdraw,
            'point_gained' => $pointGained,
            'user' => $user
        ];

        return view('landing.withdraw')->with($data);
    }
    public function withdraw_store(WithdrawRequest $request){
        $user = Auth::user()->load(['user_detail', 'user_point']);
        try{
            $transactions = DB::transaction(function() use ($request, $user){
                $history_type = 2;
                $pointData = $user->user_point;
                $history = new UsersPointHistories;
                $request->point_amount = str_replace(["."], [""], $request->point_amount);
                $history->history_type = $history_type;
                $history->no_rek_tujuan = $request->no_rekening;
                $history->kode_bank = $request->kode_bank;
                $history->point_amount = $request->point_amount;
                $history->withdraw_amount = (int)$request->point_amount * 0.002;
                $history->withdraw_status = 1;
                $history->uid = $user->id;
                $withdrawal = (int)((int)$request->point_amount * 0.002);
                if($withdrawal < (int)100000 == true){
                    DB::rollback();
                    return 'withdraw false';
                }
                $save = $history->save();
                if($save){
                    $pointData->point = (int)$pointData->point - (int)$request->point_amount;
                    $save = $pointData->save();
                    if($save){
                        DB::commit();
                        return true;
                    }
                }
                DB::rollback();
                return false;
                
            });
            if($transactions === 'withdraw false' && $transactions !== false){
                throw new \Exception('We\'re sorry Transaction Failed. Amount withdrawed too low');
            }
            if(!$transactions){
                throw new \Exception('We\'re sorry Transaction Failed. Due server problem');
            }
            return response()->json(['message' => 'withdraw success!', 'success' => true, 'returnurl' => route('logged_in.withdraw')],200);
        } catch(\Exception $e){
            return response()->json(['errors' => $e->getMessage(), 'success' => false],422);
        }
    }
    public function register_user(RegisterRequest $request){
        try{
           $transaction = DB::transaction(function() use ($request){
                $user = new User;
                $user->name = $request->nama;
                $user->password = Hash::make($request->password);
                $user->email = $request->email;
                $save = $user->save();
                if($save){
                    $userdetail = new UserDetail;
                    $userdetail->uid = $user->id;
                    $userdetail->jenis_kelamin = $request->jenis_kelamin;
                    $userdetail->no_ktp = $request->no_ktp;
                    $userdetail->no_hp = $request->no_hp;
                    $userdetail->referral = $request->referral_code;
                    $userdetail->referral_code = $this->randomInt();
                    $save = $userdetail->save();
                    if($save){
                        $userpoint = new UserPoint;
                        $userpoint->point = 0;
                        $date = new \Datetime();
                        $date->modify('+30 days');
                        $userpoint->expired = $date->format('Y-m-d H:i:s');
                        $userpoint->uid = $user->id;
                        $save = $userpoint->save();
                        if($save){
                            Auth::login($user);
                            DB::commit();
                            return true;
                        }
                    }
                }
                DB::rollback();
                return false;
           });
           if(!$transaction){
            throw new Exception('Terjadi Kesalahan saat input user baru');
           }
           return response()->json(['message' => 'Berhasil Menambahkan User Baru', 'returnurl' => route('logged_in.dashboard')], 200);
        }catch(\Exception $e){
            return response()->json(['errors' => $e->getMessage(), 'success' => false],422);

        }
    }
    public function randomInt(){
        $random = '0123456789';
        $limit = 10;
        $max = strlen($random);
        $number = rand(1,100);
        for($i = 0;$i < $limit;$i++){
            $number .= $random[rand(0, $max-1)];
        }
        $numberModel = UserDetail::where('referral_code', $number)->get();

        while (count($numberModel) > 0) {
            try {
              // Check if the number exists in the database
             
              $random = '0123456789';
              $limit = 10;
              $max = strlen($random);
              $number = rand(1,100);
              for($i = 0;$i < $limit;$i++){
                  $number .= $random[rand(0, $max-1)];
              }
              $numberModel = UserDetail::where('referral_code', $number)->get();
              if(count($numberModel) == 0){
                break;
              }
              // If the number exists, generate a new one and try again
            } catch (ModelNotFoundException $e) {
              // If the number does not exist in the database, break out of the loop
              break;
            }
        }
        return $number;
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
