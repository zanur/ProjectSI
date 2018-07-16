<?php

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
    return view('login');
})->name('awal')->middleware('guest');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{id}', 'ProfileController@show');

Route::get('/pasien', 'PasienController@index');

Route::get('/pasien/create', 'PasienController@create');

Route::post('/pasien/kirim', 'PasienController@kirim');

Route::get('/pasien/create-proses-1/{id}', 'PasienController@create1');

Route::post('/pasien/create-proses-1/', 'PasienController@kirim1');

Route::get('/pasien/create-proses-2/{id}', 'PasienController@create2');

Route::post('/pasien/create-proses-2/', 'PasienController@kirim2');

Route::get('/tugas', 'PasienController@tugas');

Route::post('/pasien/', 'PasienController@store');

Route::get('/pasien/{id}', 'PasienController@show');

Route::middleware('atasan')->group(function(){
	Route::get('/karyawan', 'KaryawanController@index');

	Route::get('/karyawan/create', 'KaryawanController@create');

	Route::post('/karyawan/', 'KaryawanController@store');

	Route::get('/karyawan/{id}/edit', 'KaryawanController@edit');

	Route::put('/karyawan/{id}', 'KaryawanController@update');

	Route::delete('/karyawan/{id}', 'KaryawanController@destroy');
});


Route::middleware('atasan')->group(function(){
	Route::get('/pengeluaran', 'PengeluaranController@index');

	Route::get('/pengeluaran/create', 'PengeluaranController@create');

	Route::post('/pengeluaran/', 'PengeluaranController@store');

	Route::get('/pengeluaran/{id}', 'PengeluaranController@show');
});