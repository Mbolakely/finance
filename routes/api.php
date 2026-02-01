<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\FolderController;
use App\http\Controllers\CessationController;
use App\http\Controllers\DecisionController;
use App\http\Controllers\FinancialController;
use App\http\Controllers\CountdownController;
use App\http\Controllers\BackupController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\DecompteController;
use App\Http\Controllers\SecoursController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes pour les beneficiaires
// Route::controller(BeneficiaireController::class)->group(function() {
//     Route::get('/beneficiary', 'list');
//     Route::delete('/beneficiary/{id}', 'destroy');
//     Route::get('/beneficiary/{id}', 'show');
//     Route::post('/beneficiary/add', 'add');
//     Route::put('/beneficiary/edit/{id}', 'update');
// });

// // Routes pour les dossiers
// Route::controller(FolderController::class)->group(function() {
//     Route::get('/folder', 'lister');
//     Route::post('/folder', 'add');
//     Route::delete('folder/{id}','delete');
//     Route::get('folder/{id}','show');
//     Route::put('folder/{id}','update');
// });

// // Routes pour les cessations
// Route::controller(CessationController::class)->group(function() {
//     Route::get('/cessation', 'list');
//     Route::post('/cessation/add', 'add');
//     Route::get('cessation/{id}','show');
//     // Route::delete('cessation/{id}','delete');
//     // Route::put('cessation/{id}','update');
// });

// // Routes pour les decisions
// Route::controller(DecisionController::class)->group(function() {
//     Route::get('/decision', 'list');
//     Route::post('/decision/add', 'add');
//     Route::delete('decision/{id}','delete');
//     Route::get('decision/{id}','show');
//     Route::put('decision/{id}','update');
// });

// // Routes pour les financial
// Route::controller(FinancialController::class)->group(function() {
//     Route::get('/finance', 'list');
//     Route::post('/finance', 'add');
//     // Route::delete('finance/{id}','delete');
//     Route::get('finance/{id}','show');
//     Route::put('finance/{id}','update');
// });

// // Routes pour les countdown
// Route::controller(CountdownController::class)->group(function() {
//     Route::get('/countdown', 'list');
//     Route::post('/countdown', 'add');
//     // Route::delete('countdown/{id}','delete');
//     Route::get('countdown/{id}','show');
//     Route::put('countdown/{id}','update');
// });

// // Routes pour les backups
// Route::controller(BackupController::class)->group(function() {
//     Route::get('/backup', 'list');
//     Route::post('/backup', 'add');
//     Route::delete('backup/{id}','delete');
//     Route::get('backup/{id}','show');
//     Route::put('backup/{id}','update');
// });

//NEW APIS FOR THE NEW VERSION
Route::apiResource('folders', FolderController::class);
Route::apiResource('beneficiaires', BeneficiaireController::class);

Route::post('folders/{folder}/beneficiaires', [FolderController::class, 'assignBeneficiaires']);

Route::get('decisions', [DecisionController::class, 'index']);
Route::get('decisions/{folderId}/url', [DecisionController::class, 'getDecisionUrl']);
Route::post('decisions', [DecisionController::class, 'store']);
Route::get('decisions/folder/{id}', [DecisionController::class, 'showByFolder']);

Route::get('decomptes', [DecompteController::class, 'index']);
Route::post('decomptes', [DecompteController::class, 'store']);
Route::get('decomptes/folder/{id}', [DecompteController::class, 'showByFolder']);

Route::get('cessations', [CessationController::class, 'index']);
Route::post('cessations', [CessationController::class, 'store']);
Route::get('cessations/folder/{id}', [CessationController::class, 'showByFolder']);

Route::get('decisions/{folder}/download', [DecisionController::class, 'download']);

Route::get(
    'decomptes/{folder}/download',
    [DecompteController::class, 'download']
);


Route::get(
    'cessations/{folder}/download',
    [CessationController::class, 'download']
);

Route::get('/decisions/{folderId}/view', [DecisionController::class, 'view']);
Route::get('/decomptes/{folderId}/view', [DecompteController::class, 'view']);
Route::get('/secours/{folderId}/view', [SecoursController::class, 'view']);
Route::get('/cessations/{folderId}/view', [CessationController::class, 'view']);