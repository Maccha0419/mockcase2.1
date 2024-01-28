<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ChangeController;

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

Route::middleware('verified')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/detail/{id}', [ShopController::class, 'detail']);
    Route::get('/research', [ShopController::class, 'search']);
    Route::post('/reservation', [ReservationController::class, 'reservation']);
    Route::get('/mypage', [MyPageController::class, 'index']);
    Route::post('/delete', [MyPageController::class, 'delete']);
    Route::post('/change', [ChangeController::class, 'index']);
    Route::post('/update', [ChangeController::class, 'update']);
});
