<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesawatController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PenjualanController;

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


route::get('/', function(){
    return redirect(route('penjualan'));
});
route::get('/admin', function(){
    return redirect(route('penjualan'));
});

route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.proses');
});


route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/data', [PenjualanController::class, 'index'])->name('penjualan');
    Route::post('/data', [PenjualanController::class, 'simpan'])->name('penjualan.create.simpan');
    Route::get('/data/create', [PenjualanController::class, 'create'])->name('penjualan.create');


    Route::get('/data/edit/{id}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::post('/data/edit/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::post('/data/hapus/{id}', [PenjualanController::class, 'delete'])->name('penjualan.hapus');



});





