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
    return view('welcome');
});
// Route::post('/', 'otentikasi\OtentikasiController@login')->name('login');
// Route::get('/', 'otentikasi\OtentikasiController@index')->name('login');
Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('login');

// Route::group(['middleware' => 'CekLoginMiddleware'], function () {
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('index');
    });
    Route::get('/crud/index', 'CrudController@index')->name('crud');
    Route::get('/crud/tambah', 'CrudController@tambah')->name('crud.tambah');
    Route::post('/crud/simpan', 'CrudController@simpan')->name('crud.simpan');
    Route::get('/crud/delete/{id}', 'CrudController@delete')->name('crud.delete');
    Route::get('/crud/{id}/edit', 'CrudController@edit')->name('crud.edit');
    Route::patch('/crud/{id}', 'CrudController@update')->name('crud.update');
    Route::get('/logout', 'otentikasi\OtentikasiController@logout')->name('logout');

    Route::resource('/konfigurasi/setup', 'Konfigurasi\SetupController');
    Route::resource('/master-data/divisi', 'MasterData\DivisiController');
    Route::resource('/master-data/karyawan', 'MasterData\KaryawanController');
    Route::get('/master-data/hapus{id}', 'MasterData\DivisiController@hapus')->name('divisi.hapus');
});


Route::get('/home', 'HomeController@index')->name('home');
