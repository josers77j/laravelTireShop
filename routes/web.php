<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TireController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth' , 'verified'], 'as' => 'admin.'], function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tires', TireController::class);
Route::resource('brands', BrandController::class);
Route::resource('inventories', InventoryController::class);
Route::resource('clients', ClientController::class);
Route::resource('sales', SaleController::class);

});
