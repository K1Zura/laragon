<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\KejuruanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\CariPembayaranController;


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
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'addRegister']);
Route::middleware(['middleware'=>'auth'])->group(function () {
    Route::get('/', [AuthController::class, 'home']);

    Route::get('/data', [ContentController::class, 'index']);

    Route::resource('data-siswa', SiswaController::class);
    Route::resource('data-kelas', KelasController::class);
    Route::get('/kelas', [SiswaController::class, 'kelas'])->name('get-kelas');
    Route::resource('data-kejuruan', KejuruanController::class);
    Route::get('/kejuruan', [KejuruanController::class, 'kejuruan'])->name('get-kejuruan');
    Route::resource('data-tahun-ajaran', TahunAjaranController::class);
    Route::get('/tahun-ajaran', [PembayaranController::class, 'tahun_ajaran'])->name('get-tahun-ajaran');
    Route::get('/kelas-pembayaran', [PembayaranController::class, 'kelasPembayaran'])->name('get-kelas-pembayaran');
    Route::resource('data-pembayaran', PembayaranController::class);

    Route::post('/toggle-kondisi', [PembayaranController::class, 'toggleKondisi'])->name('toggle-kondisi');


    Route::get('/pembayaran', [CariPembayaranController::class, 'pembayaran'])->name('search');

    Route::get('/logout', [AuthController::class, 'logout']);
});


