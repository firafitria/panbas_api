<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LaporanController;

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

Route::group(['middleware => auth:sanctum'], function(){
    # code ......
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/laporan/index', [LaporanController::class, 'index']);
Route::post('/laporan/store', [LaporanController::class, 'store']);
