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
    return view('dashboard.index');
})->middleware('auth')->name('dashboard.index');


Auth::routes();
Route::resource('employee', 'Master\EmployeeController');

Route::resource('service', 'Master\ServiceController');
Route::resource('customer', 'Master\CustomerController');



Route::get('/home', function () {
    return view('demo');
})->name('home');
