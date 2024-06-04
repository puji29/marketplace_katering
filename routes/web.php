<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['guest'])->group(function(){

    Route::get('/',[SesiController::class,'index'] )->name('login');
    Route::get('/register',[SesiController::class,'register'] )->name('register2');
    
    Route::post('/',[SesiController::class,'login'] );
    Route::post('/register',[SesiController::class,'register2']);
});

Route::get('/home',function(){
    return redirect('admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/merchants',[AdminController::class,'merchant'])->middleware('userAkses:merchant');
    Route::get('/admin/customers',[AdminController::class,'customer'])->middleware('userAkses:customer');
    Route::get('/logout',[SesiController::class,'logout']);

    Route::get('/merchant',[MerchantController::class,'index']);
    Route::get('/profil',[MerchantController::class,'profil']);
    Route::get('/profil/{id}/edit',[MerchantController::class,'edit']);
    Route::put('/profil/{id}',[MerchantController::class,'updateProfil']);

    Route::get('/makanan/create',[MerchantController::class,'createMakanan']);
    Route::post('/makanan/store',[MerchantController::class,'addMakanan']);

    
});