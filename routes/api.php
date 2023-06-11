<?php

use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TransactionController;
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

Route::middleware(['api_key'])->group(function () {
    Route::resource('services', ServiceController::class);
    Route::resource('transaction', TransactionController::class);
});


Route::get('files/{filename}', [ServiceController::class, 'getImages']);

Route::get('launch-artisan', function () {
    Artisan::call('storage:link');
});
