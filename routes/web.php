<?php

use App\Http\Controllers\MovieController;
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

Route::get('/',[ MovieController::class,'index'])->name('index');
Route::get('create', [MovieController::class,'create'])->name('create');
Route::post('store', [MovieController::class,'store'])->name('store');
Route::get('{id}/show', [MovieController::class,'show'])->name('show');
Route::get('{id}/edit', [MovieController::class,'edit'])->name('edit');
Route::put('{id}/update', [MovieController::class,'update'])->name('update');
Route::delete('{id}/destroy', [MovieController::class,'destroy'])->name('destroy');
Route::get('search', [MovieController::class, 'search'])->name('search');
