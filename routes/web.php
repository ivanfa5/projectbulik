<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsrmanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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
    return redirect('/login');
    // return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboards.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //PUNYA KODE PERKIRAAN
    Route::get('kodeperkiraan', [PerkiraanController::class, 'index'])->name('IndexKodeperkiraan');
    Route::post('kodeperkiraan', [PerkiraanController::class, 'store'])->name('StoreKodeperkiraan');
    Route::get('kodeperkiraandefault', [PerkiraanController::class, 'storedefaul'])->name('StoreKodeperkiraanDef');
    Route::delete('kodeperkiraan/{dataperkiraan}', [PerkiraanController::class, 'destroy'])->name('DestroyKodeperkiraan');
    Route::get('kodeperkiraan/{dataperkiraan}/hapusalert', [PerkiraanController::class, 'hapusalert'])->name('HapusKodeperkiraan');
    Route::patch('kodeperkiraan/{dataperkiraan}', [PerkiraanController::class, 'update'])->name('UpdateKodeperkiraan');

    //PUNYA KODE TRANSAKSI
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('IndexTransaksi');
    Route::post('transaksi', [TransaksiController::class, 'store'])->name('StoreTransaksi');
    Route::delete('transaksi/{datatransaksi}', [TransaksiController::class, 'destroy'])->name('DestroyTransaksi');
    Route::get('transaksi/{datatransaksi}/edit', [TransaksiController::class, 'edit'])->name('EditTransaksi');
    Route::patch('transaksi/{datatransaksi}', [TransaksiController::class, 'update'])->name('UpdateTransaksi');
    
    //PUNYA LAPORAN
    // Route::get('laporan', [LaporanController::class, 'index'])->name('IndexLaporan');
    Route::get('laporanmaster', [LaporanController::class, 'indexmaster'])->name('IndexLaporanmaster');
    Route::get('laporandetail', [LaporanController::class, 'indexdetail'])->name('IndexLaporandetail');
    Route::get('laporangroup', [LaporanController::class, 'indexgroup'])->name('IndexLaporangroup');
    Route::post('laporandetail', [LaporanController::class, 'olahdetail'])->name('OlahDetailLaporan');
    Route::post('laporangroupdebit', [LaporanController::class, 'olahgroupdebit'])->name('OlahGroupDebitLaporan');
    Route::post('laporangroupkredit', [LaporanController::class, 'olahgroupkredit'])->name('OlahGroupKreditLaporan');
    Route::delete('laporan/{datalaporan}', [LaporanController::class, 'destroy'])->name('DestroyLaporan');
    Route::get('laporan/{datalaporan}/edit', [LaporanController::class, 'edit'])->name('EditLaporan');
    Route::patch('laporan/{datalaporan}', [LaporanController::class, 'update'])->name('UpdateLaporan');

    //PUNYA USRMAN
    Route::get('managemenakun', [UsrmanController::class, 'index'])->name('IndexUsrman')->middleware('can:isAdmin');
    Route::post('managemenakun', [UsrmanController::class, 'store'])->name('StoreUsrman')->middleware('can:isAdmin');
    Route::delete('managemenakun/{datausrman}', [UsrmanController::class, 'destroy'])->name('DestroyUsrman')->middleware('can:isAdmin');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
