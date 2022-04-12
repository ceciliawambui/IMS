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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/', function () {
//     return view('admin.index');
// });

// Auth::routes();
// Authentication Routes...
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');
Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
// Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('products', App\Http\Controllers\ProductController::class);
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Supplier Routes
    Route::resource('suppliers', 'App\Http\Controllers\SupplierController');
    Route::post('delete-supplier', 'App\Http\Controllers\SupplierController@destroy');
    Route::get('suppliers/restore/{id}', 'App\Http\Controllers\SupplierController@restore')->name('suppliers.restore');
    Route::get('suppliers/forceDelete/{id}', 'App\Http\Controllers\SupplierController@forceDelete')->name('suppliers.forceDelete');


    // Category Routes
    Route::resource('categories', 'App\Http\Controllers\CategoryController');
    Route::post('delete-category', 'App\Http\Controllers\CategoryController@destroy');
    Route::get('categories/restore/{id}', 'App\Http\Controllers\CategoryController@restore')->name('categories.restore');
    Route::get('categories/forceDelete/{id}', 'App\Http\Controllers\CategoryController@forceDelete')->name('categories.forceDelete');

    // Product Routes
    Route::resource('products', 'App\Http\Controllers\ProductController');
    Route::post('delete-product', 'App\Http\Controllers\ProductController@destroy');
    Route::get('products/restore/{id}', 'App\Http\Controllers\ProductController@restore')->name('products.restore');
    Route::get('products/forceDelete/{id}', 'App\Http\Controllers\ProductController@forceDelete')->name('products.forceDelete');

        // Sales Routes
    Route::resource('sales', 'App\Http\Controllers\SaleController');
    Route::post('delete-sale', 'App\Http\Controllers\SaleController@destroy');
    Route::get('sales/restore/{id}', 'App\Http\Controllers\SaleController@restore')->name('sales.restore');
    Route::get('sales/forceDelete/{id}', 'App\Http\Controllers\SaleController@forceDelete')->name('sales.forceDelete');

            // Customer Routes
    Route::resource('customers', 'App\Http\Controllers\CustomerController');
    Route::post('delete-customer', 'App\Http\Controllers\CustomerController@destroy');
    Route::get('customers/restore/{id}', 'App\Http\Controllers\CustomerController@restore')->name('customers.restore');
    Route::get('customers/forceDelete/{id}', 'App\Http\Controllers\CustomerController@forceDelete')->name('customers.forceDelete');

                // Points Routes
    Route::resource('points', 'App\Http\Controllers\PointController');
    Route::post('delete-customer', 'App\Http\Controllers\PointController@destroy');
    Route::get('points/restore/{id}', 'App\Http\Controllers\PointController@restore')->name('points.restore');
    Route::get('points/forceDelete/{id}', 'App\Http\Controllers\PointController@forceDelete')->name('points.forceDelete');

});
