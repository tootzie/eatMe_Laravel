<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserApiController;
use App\Http\Controllers\MenuApiController;
use App\Http\Controllers\BisnisKulinerApiController;
use App\Http\Controllers\FavoriteApiController;
use App\Http\Controllers\OrderApiController;
use App\Http\Controllers\PemilikBisnisKulinerApiController;
use App\Http\Controllers\NotaApiController;
use App\Http\Controllers\PendapatanApiController;
use App\Http\Controllers\TransaksiEwalletApiController;
use App\Http\Controllers\FormValidasiApiController;
use App\Http\Controllers\KomplainControllerApi;
use App\Http\Controllers\DetailBundleApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Kalau tes di postman (accept = application/json)

//USERS
Route::prefix('/user')->group(function(){
    Route::post('/register', [UserApiController::class,'register']);
    Route::post('/login', [UserApiController::class,'login']);
    Route::post('/forgot-password', [UserApiController::class,'forgot']);
    Route::post('/reset-password', [UserApiController::class,'reset']);
    Route::get('/', [UserApiController::class,'index']);
    Route::get('/{id}', [UserApiController::class,'show']);
    Route::put('/{id}', [UserApiController::class,'update']);
});

//MENUS
Route::prefix('/menus')->group(function(){
    Route::post('/', [MenuApiController::class,'store']);
    Route::get('/', [MenuApiController::class,'index']);
    Route::get('/{id}', [MenuApiController::class,'show']);
    Route::put('/{id}', [MenuApiController::class,'update']);
    Route::post('/{id}', [MenuApiController::class,'updateWithImage']);
    Route::delete('/{id}', [MenuApiController::class,'destroy']);
});

//DETAIL BUNDLE
Route::prefix('/bundle')->group(function(){
    Route::post('/', [DetailBundleApiController::class,'store']);
    Route::get('/', [DetailBundleApiController::class,'index']);
    Route::get('/{id}', [DetailBundleApiController::class,'show']);
    Route::put('/{id}', [DetailBundleApiController::class,'update']);
    Route::delete('/{id}', [DetailBundleApiController::class,'destroy']);
});

//FORM VALIDASI
Route::prefix('/formvalidasi')->group(function(){
    Route::post('/', [FormValidasiApiController::class,'store']);
    Route::get('/', [FormValidasiApiController::class,'index']);
    Route::get('/{id}', [FormValidasiApiController::class,'show']);
    Route::put('/{id}', [FormValidasiApiController::class,'update']);
    Route::post('/{id}', [FormValidasiApiController::class,'updateWithImage']);
    Route::delete('/{id}', [FormValidasiApiController::class,'destroy']);
});

//BISNIS KULINER
Route::prefix('/bisniskuliner')->group(function(){
    Route::post('/', [BisnisKulinerApiController::class,'store']);
    Route::get('/', [BisnisKulinerApiController::class,'index']);
    Route::get('/{id}', [BisnisKulinerApiController::class,'show']);
    Route::put('/{id}', [BisnisKulinerApiController::class,'update']);
    Route::post('/{id}', [BisnisKulinerApiController::class,'updateWithImage']);
    Route::delete('/{id}', [BisnisKulinerApiController::class,'destroy']);
});

//PEMILIK BISNIS KULINER
Route::prefix('/pemilikbisniskuliner')->group(function(){
    Route::post('/', [PemilikBisnisKulinerApiController::class,'store']);
    Route::get('/', [PemilikBisnisKulinerApiController::class,'index']);
    Route::get('/{id}', [PemilikBisnisKulinerApiController::class,'show']);
    Route::put('/{id}', [PemilikBisnisKulinerApiController::class,'update']);
    Route::delete('/{id}', [PemilikBisnisKulinerApiController::class,'destroy']);
});

//LIST BISNIS KULINER FAVORIT
Route::prefix('/favorite')->group(function(){
    Route::post('/', [FavoriteApiController::class,'store']);
    Route::get('/', [FavoriteApiController::class,'index']);
    Route::get('/{id}', [FavoriteApiController::class,'show']);
    // Route::put('/{id}', [FavoriteApiController::class,'update']);
    Route::delete('/{id}', [FavoriteApiController::class,'destroy']);
});

//LIST ORDER (TRANSAKSI)
Route::prefix('/order')->group(function(){
    Route::post('/', [OrderApiController::class,'store']);
    Route::get('/', [OrderApiController::class,'index']);
    Route::get('/{id}', [OrderApiController::class,'show']);
    Route::put('/{id}', [OrderApiController::class,'update']);
    Route::delete('/{id}', [OrderApiController::class,'destroy']);
});

//NOTA
Route::prefix('/nota')->group(function(){
    Route::post('/', [NotaApiController::class,'store']);
    Route::get('/', [NotaApiController::class,'index']);
    Route::get('/{id}', [NotaApiController::class,'show']);
    Route::put('/{id}', [NotaApiController::class,'update']);
    Route::delete('/{id}', [NotaApiController::class,'destroy']);
});


//PENDAPATAN
Route::prefix('/pendapatan')->group(function(){
    Route::post('/', [PendapatanApiController::class,'store']);
    Route::get('/', [PendapatanApiController::class,'index']);
    Route::get('/{id}', [PendapatanApiController::class,'show']);
    Route::put('/{id}', [PendapatanApiController::class,'update']);
    Route::delete('/{id}', [PendapatanApiController::class,'destroy']);
});

//TRANSAKSI EWALLET
Route::prefix('/transaksi')->group(function(){
    Route::post('/', [TransaksiEwalletApiController::class,'store']);
    Route::get('/', [TransaksiEwalletApiController::class,'index']);
    Route::get('/{id}', [TransaksiEwalletApiController::class,'show']);
    Route::put('/{id}', [TransaksiEwalletApiController::class,'update']);
    Route::delete('/{id}', [TransaksiEwalletApiController::class,'destroy']);
});

//KOMPLAIN
Route::prefix('/komplain')->group(function(){
    Route::post('/', [KomplainControllerApi::class,'store']);
    Route::get('/', [KomplainControllerApi::class,'index']);
    Route::get('/{id}', [KomplainControllerApi::class,'show']);
    Route::put('/{id}', [KomplainControllerApi::class,'update']);
    Route::delete('/{id}', [KomplainControllerApi::class,'destroy']);
});





//Route harus diverifikasi menggunakan token (header)
// Route::middleware('auth:api')->get('/all', 'App\Http\UserController@index');

