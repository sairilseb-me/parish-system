<?php

use App\Http\Controllers\Api\BaptismController;
use App\Http\Controllers\Api\ClientControllers;
use App\Http\Controllers\Api\PriestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Client Routes
Route::get('/clients', [ClientControllers::class, 'index']);
Route::post('/clients/add-client', [ClientControllers::class, 'store']);
Route::get('/clients/search-client', [ClientControllers::class, 'searchClient']);
Route::get('/clients/specific-client/{id}', [ClientControllers::class, 'show']);
Route::get('clients/edit-client/{id}', [ClientControllers::class, 'edit']);
Route::post('clients/update-client/{id}', [ClientControllers::class, 'updateClient']);
Route::post('clients/delete-client/{id}', [ClientControllers::class, 'deleteClient']);

// Priest Routes
Route::get('/priests', [PriestController::class, 'index']);
Route::post('/priests/add-priest', [PriestController::class, 'store']);
Route::get('/priests/specific-data/{id}', [PriestController::class, 'edit']);
Route::post('/priests/update-priest', [PriestController::class, 'update']);
Route::post('/priests/delete-priest/{id}', [PriestController::class, 'delete']);

//baptism Routes
Route::get('/baptism', [BaptismController::class, 'index']);
Route::post('/baptism/add-baptism', [BaptismController::class, 'store']);
Route::get('/baptism/specific-baptism/{id}', [BaptismController::class, 'searchSpecificBaptism']);
