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




Route::middleware(['guest'])->group(function () {
    Route::get('/', 'AuthController@login');
    Route::get('login', 'AuthController@login')->name('login');
    Route::post('login_action', 'AuthController@login_action')->name('login_action');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', 'AuthController@dashboard')->name('dashboard');
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::resource('customer', 'CustomerController');
    Route::resource('company', 'CompanyController');
    Route::resource('service', 'ServiceController');
    Route::resource('bill', 'BillController');
    Route::get('bill/print/{id}', 'BillController@print')->name('bill.print');
});