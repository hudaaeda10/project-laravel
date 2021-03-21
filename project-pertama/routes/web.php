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
    return view('index');
});
Route::get('/crud/index', 'CrudController@index')->name('crud');
Route::get('/crud/tambah', 'CrudController@tambah')->name('crud.tambah');
Route::post('/crud/simpan', 'CrudController@simpan')->name('crud.simpan');
