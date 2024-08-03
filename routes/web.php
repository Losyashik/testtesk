<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);
Route::view('/import', 'import', ["title" => 'Импорт']);
Route::post('/import', [ProductController::class, 'import']);
Route::get('/{key}__{name}', [ProductController::class, 'product'])->name('product');
