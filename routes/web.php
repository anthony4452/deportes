<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('register', [LoginController::class, 'showRegForm']);

Route::resource('deportistas', DeportistaController::class);
Route::resource('disciplinas', DisciplinaController::class);
Route::resource('paises', PaisController::class);


