<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home',                             [TweetController::class, 'index'])->name('tweets.index');
    Route::post('/tweets',                          [TweetController::class, 'store'])->name('tweets.store');
    Route::delete('/tweets/{tweet}',                [TweetController::class, 'destroy'])->name('tweets.destroy');    

    Route::get('/profile/{user:name}',              [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user:name}/edit',         [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user:name}',            [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/profile/{user:name}/follow',      FollowController::class)->name('follow.store');

    Route::post('/tweets/{tweet}/like',             [LikeController::class, 'store'])->name('tweets.like.store');
    Route::delete('/tweets/{tweet}/dislike',        [LikeController::class, 'destroy'])->name('tweets.like.destroy');

    Route::get('/explore-users',                    ExploreController::class)->name('explore.index');
});