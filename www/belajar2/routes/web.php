<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvoicePenjualan;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PembelianControler;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenjualanControler;
use App\Http\Controllers\PelangganController;

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
Route::middleware(['middleware'=>'auth'])->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/index-penjualan', [PenjualanControler::class, 'home'])->name('index-penjualan');
    Route::get('/penjualan/{id}', [PenjualanControler::class, 'tambah']);
    Route::post('/penjualan', [PenjualanControler::class, 'tambahBarang']);
    Route::delete('/penjualan/{id}', [PenjualanControler::class, 'hapusBarang']);
    Route::put('/penjualan', [PenjualanControler::class, 'updateBarang']);
    Route::post('/tambahPenjualan', [PenjualanControler::class, 'tambahPenjualan']);
    Route::get('/detailPenjualan/{id}', [PenjualanControler::class, 'detailPenjualan'])->name('detailPenjualan');
    Route::get('/print-penjualan', [PenjualanControler::class, 'print']);

    Route::get('/index-pembelian', [PembelianControler::class, 'home'])->name('index-pembelian');
    Route::get('/pembelian/{id}', [PembelianControler::class, 'tambah']);
    Route::post('/pembelian', [PembelianControler::class, 'tambahBarang']);
    Route::delete('/pembelian/{id}', [PembelianControler::class, 'hapusBarang']);
    Route::put('/pembelian', [PembelianControler::class, 'updateBarang']);
    Route::post('/tambahPembelian', [PembelianControler::class, 'tambahPembelian']);
    Route::get('/detailPembelian/{id}', [PembelianControler::class, 'detailPembelian'])->name('detailPembelian');

    Route::get('/invoice-penjualan/{id}', [InvoicePenjualan::class, 'penjualanInvoice'])->name('invoice-penjualan');
    Route::get('/penjualan-invoice/{id}', [InvoicePenjualan::class, 'invoicePenjualan']);
    Route::get('/invoice-pembelian/{id}', [InvoicePenjualan::class, 'pembelianInvoice'])->name('invoice-pembelian');
    Route::get('/pembelian-invoice/{id}', [InvoicePenjualan::class, 'invoicePembelian']);

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/produk', [ProdukController::class, 'tambah']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'hapus']);
    Route::get('/print-produk', [ProdukController::class, 'print']);

    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::post('/pengguna', [PenggunaController::class, 'tambah']);
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update']);
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'hapus']);

    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::post('/pelanggan', [PelangganController::class, 'tambah']);
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'hapus']);

    Route::get('/suplier', [SuplierController::class, 'index']);
    Route::post('/suplier', [SuplierController::class, 'tambah']);
    Route::put('/suplier/{id}', [SuplierController::class, 'update']);
    Route::delete('/suplier/{id}', [SuplierController::class, 'hapus']);
});
