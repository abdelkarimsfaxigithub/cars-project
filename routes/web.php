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

Route::get('/test', function () {
    return view('cars.create');
});
Route::get('/', 'CarController@index')->name("cars.get");
Route::resource('cars', 'CarController');
Route::resource('marks', 'MarkController');
Route::resource('models', 'ModelController');
