<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login');
Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/produk', [AuthController::class, 'produk']);
    Route::get('/pelanggan', [AuthController::class, 'pelanggan']);
    Route::get('/penjualan', [AuthController::class, 'penjualan']);
    Route::get('/suplier', [AuthController::class, 'suplier']);

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/tambah-produk', [ProdukController::class, 'tambahProduk']);
    Route::post('/tambahProduk', [ProdukController::class, 'tambah']);
    Route::get('/update-produk/{id}', [ProdukController::class, 'updateProduk']);
    Route::put('/updateProduk/{id}', [ProdukController::class, 'update']);
    Route::delete('/deleteProduk/{id}', [ProdukController::class, 'delete']);

    Route::get('/tambah-pelanggan', [PelangganController::class, 'tambahPelanggan']);
    Route::post('/tambahPelanggan', [PelangganController::class, 'tambah']);
    Route::get('/update-pelanggan/{id}', [PelangganController::class, 'updatePelanggan']);
    Route::put('/updatePelanggan/{id}', [PelangganController::class, 'update']);
    Route::delete('/deletePelanggan/{id}', [PelangganController::class, 'delete']);

    Route::get('/tambah-suplier', [SuplierController::class, 'tambahSuplier']);
    Route::post('/tambahSuplier', [SuplierController::class, 'tambah']);
    Route::get('/update-suplier/{id}', [SuplierController::class, 'updateSuplier']);
    Route::put('/updateSuplier/{id}', [SuplierController::class, 'update']);
    Route::delete('/deleteSuplier/{id}', [SuplierController::class, 'delete']);

    Route::get('/tambah-penjualan', [PenjualanController::class, 'tambahPenjualan']);
    Route::post('/tambahPenjualan', [PenjualanController::class, 'tambah']);
    Route::get('/update-penjualan/{id}', [PenjualanController::class, 'updatePenjualan']);
    Route::put('/updatePenjualan/{id}', [PenjualanController::class, 'update']);
    Route::delete('/deletePenjualan/{id}', [PenjualanController::class, 'delete']);
});

