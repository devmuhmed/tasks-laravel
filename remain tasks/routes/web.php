<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController; // == require('App/TestController')

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
   return view('welcome');
});


// Route::get('/test', function () {
//     $someStatement = 'this is test var';

//     return view('test', ['testVar' => $someStatement, 'testing' => 'some value of testing']);
// });

Route::get('/test-controller-show',[TestController::class, 'test']);

Route::group(['middleware' => ['auth'] ], function() {
   Route::get('posts',[PostController::class, 'index'])->name('posts.index');
   Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
   Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
   Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
});
use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // implement the logic to login user manually into our system
});
// Route::get('posts',[PostController::class, 'index'])->name('posts.index')->middleware(['auth']);
// Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create')->middleware(['auth']);
// Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show')->middleware(['auth']);
// Route::post('/posts',[PostController::class, 'store'])->name('posts.store')->middleware(['auth']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
