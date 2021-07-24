<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

Route::resource('posts',postcontroller::class);


Route::get('/', function () {
    return view('welcome');
});
// });
// Route::get('/hello', function () {
//     return view('hello', ['name' => 'Samantha','age' => 19,'books'=>['tt','ll'] ] );
// })