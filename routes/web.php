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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
// Show View
Route::get('/',[PostController::class, 'home'])->name('home');
Route::get('/post/{id}', [PostController::class, 'show'])->name('show.post');
// Create Post
Route::get('/create_post', [PostController::class, 'create'])->middleware(['auth'])->name('create');
Route::post('/create_store', [PostController::class, 'store']);
// Edit Post
Route::get('/post/edit/{id}', [PostController::class, 'edit']);
Route::put('/post/update/{id}', [PostController::class, 'update'])->name('update');
// Delete Post
Route::get('/post/delete/{id}', [PostController::class, 'delete'])->middleware(['auth']);
// Log Out
Route::get('/logout', [PostController::class, 'logOut'])->middleware(['auth'])->name('logout.user');

Route::get('/search',[PostController::class, 'searchIt'])->name('search');
route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');
require __DIR__.'/auth.php';

