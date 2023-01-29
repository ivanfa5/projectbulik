<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerkiraanController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/dashboard', function () {
    return view('dashboards.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    //PUNYA KODE PERKIRAAN
    Route::get('kodeperkiraan', [PerkiraanController::class, 'index'])->name('IndexKodeperkiraan');
    Route::post('kodeperkiraan', [PerkiraanController::class, 'store'])->name('StoreKodeperkiraan');
    Route::get('kodeperkiraandefault', [PerkiraanController::class, 'storedefaul'])->name('StoreKodeperkiraanDef');
    Route::delete('kodeperkiraan/{dataperkiraan}', [PerkiraanController::class, 'destroy'])->name('DestroyKodeperkiraan');
    Route::get('kodeperkiraan/{dataperkiraan}/edit', [PerkiraanController::class, 'edit'])->name('EditKodeperkiraan');
    // Route::get('kriteria/{datakriteria}/edit', 'KriteriaController@edit');
    Route::patch('kodeperkiraan/{dataperkiraan}', [PerkiraanController::class, 'update'])->name('UpdateKodeperkiraan');

    //PUNYA KODE TRANSAKSI
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('IndexTransaksi');
    Route::post('transaksi', [TransaksiController::class, 'store'])->name('StoreTransaksi');
    Route::delete('transaksi/{datatransaksi}', [TransaksiController::class, 'destroy'])->name('DestroyTransaksi');
    Route::get('transaksi/{datatransaksi}/edit', [TransaksiController::class, 'edit'])->name('EditTransaksi');
    Route::patch('transaksi/{datatransaksi}', [TransaksiController::class, 'update'])->name('UpdateTransaksi');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
