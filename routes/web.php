<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiamondController;



Route::get('/', [DiamondController::class, 'index']);
Route::Post('/', [DiamondController::class, 'import']);
Route::get('/display', [DiamondController::class, 'show']);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
