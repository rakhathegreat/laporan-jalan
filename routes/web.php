<?php

use App\Http\Controllers\DataJalanController;
use App\Models\DataJalan;
use Illuminate\Support\Facades\Route;


Route::resource('data-jalan', DataJalanController::class);

Route::group([], function () {
    Route::view('/', 'admin.dashboard');
    Route::view('/dashboard', 'admin.dashboard');
    Route::view('/maps', 'admin.maps');
    Route::view('/laporan', 'admin.laporan');
});

Route::delete('/data-jalan', [DataJalanController::class, 'deleteAll'])->name('data-jalan.delete');