<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/recipe', [RecipeController::class, 'index'])->name('recipe.index');
Route::get('/recipe/create', [RecipeController::class, 'create'])->name('recipe.create');
Route::post('/recipe', [RecipeController::class, 'store'])->name('recipe.store');
Route::get('/recipe/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipe.edit');
Route::put('/recipe/{recipe}/update', [RecipeController::class, 'update'])->name('recipe.update');
Route::delete('/recipe/{recipe}/hapus', [RecipeController::class, 'hapus'])->name('recipe.hapus');