<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\BeneficiaryController;
use App\http\Controllers\FolderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes pour les beneficiaires
Route::controller(BeneficiaryController::class)->group(function() {
    Route::get('/beneficiary', 'list');
    Route::delete('/beneficiary/{id}', 'destroy');
    Route::get('/beneficiary/{id}', 'show');
    Route::post('/beneficiary/add', 'add');
});

// Routes pour les dossiers
Route::controller(FolderController::class)->group(function() {
    Route::get('/folder', 'lister');
});