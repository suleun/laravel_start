<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/post', function () {
    return view('hbl/post');
})->name('hbl.post');


Route::get('/show', function () {
    return view('hbl/show');
})->name('hbl.show');



Route::get('/list', [PostsController::class, "index"])->middleware('auth')->name('post.list');


require __DIR__.'/auth.php';
