<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\CatalogController;
use \App\Http\Controllers\DetailController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/vehicles', [CatalogController::class, 'index'])->name('vehicles');
Route::get('/vehicle/{id}', [DetailController::class, 'index']);

