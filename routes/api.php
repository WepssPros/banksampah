<?php

use App\Http\Controllers\API\PenarikanController;
use App\Http\Controllers\API\PengajuanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\TabunganController;

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


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('transactions', [TransactionController::class, 'all']);
    Route::get('tabungan', [TabunganController::class, 'all']);
   

    Route::get('penarikan', [PenarikanController::class, 'all']);
    Route::get('pengajuan', [PengajuanController::class, 'all']);

    Route::post('pengajuancreate', [PengajuanController::class, 'createPengajuan']);
    Route::post('tabungancreate', [TabunganController::class, 'createTabungan']);
    Route::post('checkout', [TransactionController::class, 'checkout']);
    Route::post('withdraw', [PenarikanController::class, 'withdraw']);
});


Route::get('products', [ProductController::class, 'all']);
Route::get('categories', [ProductCategoryController::class, 'all']);

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
