<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
/*Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');*/

/*Route::group(['prefix' => 'products', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/products', [ProductController::class]);
});*/
/**
 * This sets all the CRUD routes for the product domain
 */
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
Route::middleware('auth:sanctum')->group( function () {
    Route::delete('logout', [LoginController::class, 'logout']);
    Route::resource('products', ProductController::class);
});