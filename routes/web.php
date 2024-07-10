<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;

Route::get('/', [ImagesController::class, 'index']);
Route::post('/upload', [ImagesController::class, 'store'])->name('upload');
