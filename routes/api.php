<?php

use App\Http\Controllers\Api\CategoryController;
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

// all categories --> method type (get) /categories
// store category --> method type (post) /categories
// show category --> method type (get) /categories/{category}
// update category --> method type (put) /categories/{category}

// Route::get('/categories', [CategoryController::class, 'index']);
// Route::post('/categories', [CategoryController::class, 'store']);
// Route::get('/categories/{category}', [CategoryController::class, 'show']);
// Route::put('/categories/{category}', [CategoryController::class, 'update']);
// Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

Route::apiResource('/categories', CategoryController::class);