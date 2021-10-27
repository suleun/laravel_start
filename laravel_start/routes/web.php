<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;
use App\Models\Post;

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


Route::get('/post/list', [PostsController::class, "index"])->middleware('auth')->name('post.list');

Route::get('/post/show/{id}', [PostsController::class, "show"])->middleware('auth')->name('post.show');



Route::get('/post', [PostsController::class,"create"])->middleware('auth')->name('post.create');

Route::post('/post/store', [PostsController::class,"store"])->middleware('auth')->name('post.store');


Route::get('/post/edit/{id}', [PostsController::class,"edit"])->middleware('auth')->name('post.edit');

Route::patch('/post/update/{id}', [PostsController::class,"update"])->middleware('auth')->name('post.update');


require __DIR__.'/auth.php';
