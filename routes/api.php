<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('/sync', [Api\SyncController::class, 'syncData']);
});
Route::post('/addTower', [Api\SyncController::class, 'addTower']);
Route::post('/addFlats', [Api\SyncController::class, 'addFlats']);
Route::post('/addUserIssues', [Api\SyncController::class, 'addUserIssues']);
Route::post('/UploadData', [Api\SyncController::class, 'UploadData']);


