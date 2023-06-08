<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ChatgptController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('post', PostController::class)
->middleware(['auth', 'verified']);

Route::post('/chatgpt', [ChatgptController::class, 'getResponse'])->name('chatgpt');


Route::get('favorite', [FavoriteController::class, 'index'])->name('favorite_post');
Route::post('favorite/{post_id}', [FavoriteController::class, 'store'])->name('favorite');
Route::delete('favorite/{post_id}', [FavoriteController::class, 'destroy'])->name('unfavorite');

require __DIR__.'/auth.php';
