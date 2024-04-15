<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
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
Route::middleware(['middleware'=>'auth'])->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/produk', [ProdukController::class, 'tambah'])->name('produk');
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'hapus']);
    Route::get('/print-produk', [ProdukController::class, 'print']);

    Route::get('/penjualan/{id}', [PenjualanController::class, 'index'])->name('penjualan');
    Route::get('/home-penjualan', [PenjualanController::class, 'home'])->name('home-penjualan');
    Route::post('/penjualan', [PenjualanController::class, 'tambahBarang']);
    Route::delete('/penjualan/{id}', [PenjualanController::class, 'hapusBarang']);
    Route::put('/penjualan', [PenjualanController::class, 'updateBarang']);
    Route::post('/tambahPenjualan', [PenjualanController::class, 'penjualan']);
    Route::get('/detail-penjualan/{id}', [PenjualanController::class, 'detailPenjualan'])->name('detailPenjualan');
    Route::get('/print-penjualan', [PenjualanController::class, 'print'])->name('print');

    Route::get('/pembelian/{id}', [PembelianController::class, 'index'])->name('pembelian');
    Route::get('/home-pembelian', [PembelianController::class, 'home'])->name('home-pembelian');
    Route::post('/pembelian', [PembelianController::class, 'tambahBarang']);
    Route::delete('/pembelian/{id}', [PembelianController::class, 'hapusBarang']);
    Route::put('/pembelian', [PembelianController::class, 'updateBarang']);
    Route::post('/tambahPembelian', [PembelianController::class, 'pembelian']);
    Route::get('/detail-pembelian/{id}', [PembelianController::class, 'detailPembelian'])->name('detailPembelian');

    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::post('/pelanggan', [PelangganController::class, 'tambah']);
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'Hapus']);

    Route::get('/suplier', [SuplierController::class, 'index']);
    Route::post('/suplier', [SuplierController::class, 'tambah']);
    Route::put('/suplier/{id}', [SuplierController::class, 'update']);
    Route::delete('/suplier/{id}', [SuplierController::class, 'Hapus']);

    Route::get('/invoice/{id}', [InvoiceController::class, 'index'])->name('invoice');
    Route::get('/print-invoice/{id}', [InvoiceController::class, 'printInvoice'])->name('printInvoice');
    Route::get('/invoice-pembelian/{id}', [InvoiceController::class, 'pembelian'])->name('invoice-pembelian');
    Route::get('/print-pembelian-invoice/{id}', [InvoiceController::class, 'pembelianInvoice'])->name('printInvoice');

    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::post('/pengguna', [PenggunaController::class, 'tambah']);
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update']);
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'hapus']);

    Route::get('/history', [HistoryController::class, 'index']);
});
