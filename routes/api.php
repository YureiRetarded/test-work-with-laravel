<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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
Route::group([

    'middleware' => 'api',

], function ($router) {
    Route::post('/auth/login', [AuthController::class,'login']);
    Route::post('/auth/logout', [AuthController::class,'logout']);
    Route::post('/auth/refresh', [AuthController::class,'refresh']);
    Route::post('/auth/me', [AuthController::class,'me']);
});
Route::group([
    'middleware' => 'jwt.auth',
], function () {
    Route::get('/posts',[PostController::class, 'index'])->name('post.index');
});