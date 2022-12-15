<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\{User, UserDetail};
use Hash;
use Auth;
use Illuminate\Support\Facades\Response;
class LoginController extends Controller
{
    //
    public function authenticate(LoginRequest $request){
        $user = User::where('email', $request->username)->first();
        if(empty($user)){
            $user = UserDetail::where('no_hp', $request->username)->first();
            $user = User::find($user->uid);
        }
        if(Hash::check($request->password, $user->password)){
            Auth::login($user);
            return ['message' => 'Login Success. Please Wait...', 'returnurl' => route('logged_in.dashboard')];
        }else{
            return Response::json(['errors' => ['password' => 'Password is incorrect!'], 'password' => Hash::make('123456'), 'code' => 404],422);
        }
    }
}
