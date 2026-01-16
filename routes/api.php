<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\BeneficiaryController;
use App\http\Controllers\FolderController;
use App\http\Controllers\CessationController;
use App\http\Controllers\DecisionController;
use App\http\Controllers\FinancialController;
use App\http\Controllers\CountdownController;
use App\http\Controllers\BackupController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes pour les beneficiaires
Route::controller(BeneficiaryController::class)->group(function() {
    Route::get('/beneficiary', 'list');
    Route::delete('/beneficiary/{id}', 'destroy');
    Route::get('/beneficiary/{id}', 'show');
    Route::post('/beneficiary/add', 'add');
    Route::put('/beneficiary/edit/{id}', 'update');
});

// Routes pour les dossiers
Route::controller(FolderController::class)->group(function() {
    Route::get('/folder', 'lister');
    Route::post('/folder', 'add');
    Route::delete('folder/{id}','delete');
    Route::get('folder/{id}','show');
    Route::put('folder/{id}','update');
});

// Routes pour les cessations
Route::controller(CessationController::class)->group(function() {
    Route::get('/cessation', 'list');
    Route::post('/cessation/add', 'add');
    Route::get('cessation/{id}','show');
    // Route::delete('cessation/{id}','delete');
    // Route::put('cessation/{id}','update');
});

// Routes pour les decisions
Route::controller(DecisionController::class)->group(function() {
    Route::get('/decision', 'list');
    Route::post('/decision/add', 'add');
    Route::delete('decision/{id}','delete');
    Route::get('decision/{id}','show');
    Route::put('decision/{id}','update');
});

// Routes pour les financial
Route::controller(FinancialController::class)->group(function() {
    Route::get('/finance', 'list');
    Route::post('/finance', 'add');
    // Route::delete('finance/{id}','delete');
    Route::get('finance/{id}','show');
    Route::put('finance/{id}','update');
});

// Routes pour les countdown
Route::controller(CountdownController::class)->group(function() {
    Route::get('/countdown', 'list');
    Route::post('/countdown', 'add');
    // Route::delete('countdown/{id}','delete');
    Route::get('countdown/{id}','show');
    Route::put('countdown/{id}','update');
});

// Routes pour les backups
Route::controller(BackupController::class)->group(function() {
    Route::get('/backup', 'list');
    Route::post('/backup', 'add');
    Route::delete('backup/{id}','delete');
    Route::get('backup/{id}','show');
    Route::put('backup/{id}','update');
});