<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\PaisController;

Route::get('/', [DeportistaController::class, 'index']);

Route::resource('deportistas', DeportistaController::class);
Route::resource('disciplinas', DisciplinaController::class);
Route::resource('paises', PaisController::class);

