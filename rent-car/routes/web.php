<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\CatalogController;
use \App\Http\Controllers\DetailController;
use \App\Http\Controllers\ReservationController;


Route::get('/', [HomeController::class, 'index'])->name('home.home');
Route::post('/', [HomeController::class, 'send'])->name('home.send');

Route::get('/vehicles', [CatalogController::class, 'index'])->name('vehicles.all');
Route::get('/vehicle/{id}', [DetailController::class, 'index'])->name('vehicle.detail');;

Route::get('/reservation/{id}', [ReservationController::class, 'index'])->name('reservation.show');
Route::post('/reservation/{id}', [ReservationController::class, 'send'])->name('reservation.send');

Route::get('/vehicles/{param}/{value}', [CatalogController::class, 'filter']);
