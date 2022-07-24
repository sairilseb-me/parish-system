<?php

use App\Http\Controllers\Api\ClientControllers;
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


Route::get('/clients', [ClientControllers::class, 'index']);
Route::post('/clients/add-client', [ClientControllers::class, 'store']);
Route::get('/clients/search-client', [ClientControllers::class, 'searchClient']);
Route::get('/clients/specific-client/{id}', [ClientControllers::class, 'show']);
Route::get('clients/edit-client/{id}', [ClientControllers::class, 'edit']);