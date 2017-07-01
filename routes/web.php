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

Route::resource('/', 'LaporanKeuanganController');
Route::get('file', 'LaporanKeuanganController@data');
Route::get('preview-file', 'LaporanKeuanganController@previewFile');
Route::get('export-file', 'LaporanKeuanganController@exportFile');
Route::post('import-file', 'LaporanKeuanganController@importFile');
