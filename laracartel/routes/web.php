<?php

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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('users', UsersController::class);
});

Route::namespace('\App\Http\Controllers\Commercial')->prefix('commercial')->name('commercial.')->group(function () {
    Route::resource('client', ClientController::class);
    Route::resource('transport', TransportController::class);
    Route::resource('vente', VenteController::class);
});

Route::namespace('\App\Http\Controllers\Stocks')->prefix('stocks')->name('stocks.')->group(function () {
    Route::resource('arme', ArmeController::class);
    Route::resource('entrepot', EntrepotController::class);
    Route::resource('produit', ProduitController::class);
    Route::resource('stock', StockController::class);
});
