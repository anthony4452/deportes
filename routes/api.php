<?php

use App\Http\Controllers\Api\PaisApiController;
use App\Http\Controllers\Api\DisciplinaApiController;

Route::apiResource('disciplinas', DisciplinaApiController::class);
Route::apiResource('paises', PaisApiController::class);