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

Route::get('/',[\App\Http\Controllers\RecipeController::class, 'index'])->name('recipes.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('recipes', \App\Http\Controllers\RecipeController::class);
Route::resource('favorites', \App\Http\Controllers\FavoriteController::class);
Route::resource('comments', \App\Http\Controllers\CommentController::class);
Route::resource('replies', \App\Http\Controllers\ReplyController::class);

Route::get('recipessearch', [\App\Http\Controllers\RecipeController::class, 'search'])->name('recipes.search');

Route::prefix('manage')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminDashboardController::class, 'index'])->name('manage.dashboard.index');
    Route::post('recipes', [\App\Http\Controllers\RecipemanageController::class,'store'])->name('manage.recipes.store');
    Route::get('recipes', [\App\Http\Controllers\RecipemanageController::class, 'index'])->name('manage.recipes.index');
    Route::get('recipes/create', [\App\Http\Controllers\RecipemanageController::class, 'create'])->name('manage.recipes.create');
    Route::get('recipes/{id}/edit', [\App\Http\Controllers\RecipemanageController::class, 'edit'])->name('manage.recipes.edit');
    Route::patch('recipes/{id}', [\App\Http\Controllers\RecipemanageController::class, 'update'])->name('manage.recipes.update');
    Route::delete('recipes/{id}', [\App\Http\Controllers\RecipemanageController::class, 'destroy'])->name('manage.recipes.destroy');
});

