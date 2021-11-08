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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/details/{id}', 'DetailController@index')->name('detail');
Route::get('/cart', 'CartController@index')->name('cart');


Route::get('/dashboard', 'DashboardController@index')
    ->name('dashboard');

Route::get('/dashboard/product', 'DashboardProductController@index')
    ->name('dashboard-product');
Route::get('/dashboard/product/create', 'DashboardProductController@create')
    ->name('dashboard-product-create');
Route::get('/dashboard/product/{id}', 'DashboardProductController@details')
    ->name('dashboard-product-details');    

Route::get('/dashboard/transactions', 'DashboardTransactionController@index')
    ->name('dashboard-transaction');
Route::get('/dashboard/transactions/{id}', 'DashboardTransactionController@details')
    ->name('dashboard-transaction-details');

Route::get('/dashboard/settings', 'DashboardSettingController@strore')
    ->name('dashboard-setting-store');
Route::get('/dashboard/account', 'DashboardSettingController@account')
    ->name('dashboard-setting-account');


Route::prefix('admin')
    ->namespace('Admin')
    //->middleware('auth','admin')
    ->group(function(){
        Route::get('/','DashboardController@index')->name('admin-dashboard');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
    });

Auth::routes();


