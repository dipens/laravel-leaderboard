<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaderController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('api')->get('/leaders', [LeaderController::class, 'index']);
Route::middleware('api')->get('/leaders/{id}', [LeaderController::class, 'show']);
Route::middleware('api')->post('/leaders', [LeaderController::class, 'create']);
Route::middleware('api')->put('/leaders/{id}', [LeaderController::class, 'update']);
Route::middleware('api')->put('/updatePoints/{actionType}/{id}', [LeaderController::class, 'updatePoints']);
Route::middleware('api')->delete('/leaders/{id}', [LeaderController::class, 'delete']);
