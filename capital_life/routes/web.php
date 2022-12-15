<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\{
    DashboardController as Dashboard
};
use App\Http\Controllers\LoginController;
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

Route::get('', [Dashboard::class, 'index_guess'])->name('home');


Auth::routes();
Route::get('new_account', function(){
    return view('landing.register');
})->name('landing.register');
Route::group(['prefix' => 'logged_in', 'middleware' => 'auth'], function(){
    Route::get('dashboard', [Dashboard::class, 'index'])->name('logged_in.dashboard');
    Route::get('article/{slug}', [Dashboard::class, 'article'])->name('logged_in.article');
    Route::get('readed-article/{slug}', [Dashboard::class, 'readed_article'])->name('logged_in.readed_article');

    Route::post('storePoint/{articles}', [Dashboard::class, 'storePoint'])->name('logged_in.store_point');

    Route::get('articles', [Dashboard::class, 'articles'])->name('logged_in.articles');
    Route::get('withdraw', [Dashboard::class, 'withdraw'])->name('logged_in.withdraw');
    Route::post('withdraw', [Dashboard::class, 'withdraw_store'])->name('logged_in.withdraw');

});
Route::get('guess_article/{slug}', [Dashboard::class, 'readed_article'])->name('article_guess');

Route::post('authenticate_user', [LoginController::class, 'authenticate'])->name('authenticate.user');
Route::get('/point-info', [Dashboard::class, 'get_point'])->name('get.point_info');
Route::post('register-action', [Dashboard::class, 'register_user'])->name('register_user');
Route::get('/logout', [Dashboard::class, 'logout'])->name('logout');


