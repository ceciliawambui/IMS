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
    return view('admin.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Supplier Routes
Route::resource('suppliers', 'App\Http\Controllers\SupplierController');
Route::post('delete-supplier', 'App\Http\Controllers\SupplierController@destroy');
Route::get('suppliers/restore/{id}', 'App\Http\Controllers\SupplierController@restore')->name('suppliers.restore');
Route::get('suppliers/forceDelete/{id}', 'App\Http\Controllers\SupplierController@forceDelete')->name('suppliers.forceDelete');
