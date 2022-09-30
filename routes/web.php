<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanJemputController;
use App\Http\Controllers\LaporanPenarikanController;
use App\Http\Controllers\LaporanPengajuanController;
use App\Http\Controllers\LaporanProductController;
use App\Http\Controllers\LaporanTabunganController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MyTransactionController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\PengajuansosialisasiController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\TabunganController;

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
Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        

        Route::middleware(['admin'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
            Route::resource('product', ProductController::class);
            Route::resource('pengajuan', PengajuansosialisasiController::class);
            Route::resource('tabungan', TabunganController::class);

            Route::resource('penarikan', PenarikanController::class);
            Route::resource('category', ProductCategoryController::class);
            Route::resource('product.gallery', ProductGalleryController::class)->shallow()->only([
                'index', 'create', 'store', 'destroy'
            ]);
            Route::resource('transaction', TransactionController::class)->only([
                'index', 'show', 'edit', 'update'
            ]);
            Route::resource('user', UserController::class)->only([
                'index', 'edit', 'update', 'destroy'
            ]);


            ///Laporan
            Route::resource('laporantabungan', LaporanTabunganController::class);
            Route::resource('laporanproduct', LaporanProductController::class);
            Route::resource('laporanpenarikan', LaporanPenarikanController::class);
            Route::resource('laporanjemput', LaporanJemputController::class);
            Route::resource('laporanpengajuan', LaporanPengajuanController::class);
        });
    });
});
