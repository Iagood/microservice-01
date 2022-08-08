<?php

use App\Http\Controllers\Api\CategoryController;
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

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class,'index']);
    Route::get('/{id}', [CategoryController::class,'show']);
    Route::post('/', [CategoryController::class,'beforeStore']);
    Route::put('/{id}', [CategoryController::class,'beforeUpdate']);
    Route::delete('/{id}', [CategoryController::class,'destroy']);
});
