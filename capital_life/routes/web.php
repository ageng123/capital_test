<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\{
    DashboardController as Dashboard
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing.index');
});

Auth::routes();
Route::get('new_account', function(){
    return view('landing.register');
})->name('landing.register');
Route::group(['prefix' => 'logged_in'], function(){
    Route::get('dashboard', [Dashboard::class, 'index'])->name('logged_in.dashboard');
    Route::get('article', [Dashboard::class, 'article'])->name('logged_in.article');

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
