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
Route::resource('kelas', KelasController::class)->except('show');
Route::resource('kitab', KitabController::class)->except('show');
Route::resource('bab', BabController::class)->except('show');
Route::get('bab/{kitab}/get', 'BabController@get')->name('bab.get');
Route::resource('siswa', SiswaController::class);
Route::get('siswa/{kelas_id}/get', 'SiswaController@get')->name('siswa.get');
Route::resource('hafalan', HafalanController::class);
Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
Route::get('laporan/{siswa_id}/print','LaporanController@print')->name('laporan.print');