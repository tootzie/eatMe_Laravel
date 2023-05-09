<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardEwalletController;
use App\Http\Controllers\DashboardValidasiBisnisController;
use App\Http\Controllers\DashboardTransaksiController;
use App\Http\Controllers\DashboardPendapatanController;
use App\Http\Controllers\DashboardKomplainController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardBisnisController;

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

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');


//User
Route::resource('/dashboard/user', DashboardUserController::class)->middleware('auth');

//Bisnis Kuliner
Route::resource('/dashboard/bisnis', DashboardBisnisController::class)->middleware('auth');

//Ewallet
Route::resource('/dashboard/ewallet', DashboardEwalletController::class)->middleware('auth');
Route::put('/dashboard/validasibisnis/updatemanual/{id}', [DashboardEwalletController::class,'updateManual']);

//Validasi Bisnis Kuliner
Route::resource('/dashboard/validasibisnis', DashboardValidasiBisnisController::class)->middleware('auth');
Route::put('/dashboard/validasibisnis/konfirmasi/{id}', [DashboardValidasiBisnisController::class,'validasiForm']);

//Transaksi
Route::resource('/dashboard/transaksi', DashboardTransaksiController::class)->middleware('auth');


//Pendapatan
Route::resource('/dashboard/pendapatan', DashboardPendapatanController::class)->middleware('auth');
Route::put('/dashboard/pendapatan/konfirmasi/{id}', [DashboardPendapatanController::class,'validasiTransfer']);

//Komplain
Route::resource('/dashboard/komplain', DashboardKomplainController::class)->middleware('auth');
Route::put('/dashboard/komplain/konfirmasi/{id}', [DashboardKomplainController::class,'validasiKomplain']);
Route::get('/dashboard/komplain/sendemail/{idNota}/{receiver}', [DashboardKomplainController::class,'sendEmail']);


Route::view('forgot_password', 'auth.reset_password')->name('password.reset');

require __DIR__.'/auth.php';
