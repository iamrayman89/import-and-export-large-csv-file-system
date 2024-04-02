<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiamondController;



Route::get('/', function () {
    return view('import-csv-file');
});



Route::get('/', [DiamondController::class, 'index']);

Route::post('/upload', [DiamondController::class, 'upload']);


Route::post('/', [DiamondController::class, 'upload']);

Route::get('/batch', [DiamondController::class, 'batch']);

Route::get('/view', [DiamondController::class, 'getSales']);

Route::get('/delete', [DiamondController::class, 'clearTable']);

Route::get('/download', [DiamondController::class, 'export']);




