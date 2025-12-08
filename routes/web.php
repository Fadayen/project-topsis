<?php

use App\Http\Controllers\TopsisController;

Route::get('/', [TopsisController::class, 'index']);
Route::get('/topsis', [TopsisController::class, 'index'])->name('topsis.index');

Route::post('/candidates', [TopsisController::class, 'store'])->name('candidates.store');
Route::get('/topsis/calculate', [TopsisController::class, 'calculate'])->name('topsis.calculate');

