<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\MyPlaceController2;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test1', function () {
    return 'TEST1';
});
Route::get('/test2', function () {
    return 'TEST2';
});
Route::get('/test3',  [MyPlaceController::class, 'index']);
Route::get('/test4', [MyPlaceController::class, 'noindex']);
Route::get('/test5', [MyPlaceController2::class, 'qwerty']);