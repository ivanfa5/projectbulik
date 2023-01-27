<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerkiraanController;

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
    Route::delete('kodeperkiraan/{perkiraan}', [PerkiraanController::class, 'destroy'])->name('DestroyKodeperkiraan');
    Route::get('kodeperkiraan/{perkiraan}/edit', [PerkiraanController::class, 'edit'])->name('EditKodeperkiraan');
    // Route::get('kriteria/{datakriteria}/edit', 'KriteriaController@edit');
    Route::patch('kodeperkiraan/{dataperkiraan}', [PerkiraanController::class, 'update'])->name('UpdateKodeperkiraan');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
