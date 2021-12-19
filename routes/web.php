<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('recipes', \App\Http\Controllers\RecipeController::class);
Route::resource('favorites', \App\Http\Controllers\FavoriteController::class);
Route::resource('comments', \App\Http\Controllers\CommentController::class);
Route::resource('replies', \App\Http\Controllers\ReplyController::class);
