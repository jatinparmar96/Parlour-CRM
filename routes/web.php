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


\Illuminate\Support\Facades\Auth::routes();

Route::get('select-shop', 'Master\ShopController@selectShop')->name('select-shop');
Route::post('setShop', 'Master\ShopController@setShop')->name('setShop');
Route::group(['middleware' => ['shop.selected', 'auth']], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');
    Route::resource('employee', 'Master\EmployeeController');
    Route::resource('service', 'Master\ServiceController');
    Route::resource('customer', 'Master\CustomerController');
    Route::resource('bill', 'BillController');
    Route::get('bills', 'BillController@get')->name('bill.get');
    Route::get('getCustomers', 'Master\CustomerController@getCustomers')->name('getCustomers');

    Route::get('getEmployees', 'Master\EmployeeController@getEmployees')->name('getEmployees');

    Route::get('getServices', 'Master\ServiceController@getServices')->name('getServices');

    Route::get('/home', function () {
        return view('demo');
    })->name('home');
});
