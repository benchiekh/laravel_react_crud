<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FicheDePaieController;
use App\Http\Controllers\CotisationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes individuelles pour les employés
Route::get('employees', [EmployeeController::class, 'index']);
Route::post('employees', [EmployeeController::class, 'store']);
Route::get('employees/{id}', [EmployeeController::class, 'show']);
Route::put('employees/{id}', [EmployeeController::class, 'update']);
Route::delete('employees/{id}', [EmployeeController::class, 'destroy']);

// Routes individuelles pour les fiches de paie
Route::get('fiche-de-paies', [FicheDePaieController::class, 'index']);
Route::post('fiche-de-paies', [FicheDePaieController::class, 'store']);
Route::get('fiche-de-paies/{id}', [FicheDePaieController::class, 'show']);
Route::put('fiche-de-paies/{id}', [FicheDePaieController::class, 'update']);
Route::delete('fiche-de-paies/{id}', [FicheDePaieController::class, 'destroy']);

// Routes pour les cotisations
Route::prefix('fiche-de-paies/{ficheDePaieId}')->group(function () {
    Route::get('cotisations', [CotisationController::class, 'index']);
    Route::post('cotisations', [CotisationController::class, 'store']);
    Route::get('cotisations/{cotisationId}', [CotisationController::class, 'show']);
    Route::put('cotisations/{cotisationId}', [CotisationController::class, 'update']);
    Route::delete('cotisations/{cotisationId}', [CotisationController::class, 'destroy']);
});
