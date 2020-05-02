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

Route::get('/ukm', 'WebController@admlogin');
Route::post('/ukm/proses', 'LoginController@admin');

Route::get('/ukm/dashboard', 'WebController@admdash');

Route::get('/SignUp', 'WebController@mhsSign');
Route::post('/SignUp/proses', 'LoginController@mhs');

Route::get('ukm/dashboard/logout', 'LoginController@logout');

Route::get('ukm/dashboard/daftar-mahasiswa', 'DashboardController@list');
Route::get('/ukm/dashboard/daftar-mahasiswa/inid={ID}', 'DashboardController@action0');
Route::get('/ukm/dashboard/daftar-mahasiswa/id={ID}', 'DashboardController@action1');

Route::get('/ukm/dashboard/Tambah-Anggota', 'AnggotaController@tAnggota');
Route::post('/ukm/dashboard/Tambah-Anggota/proses', 'AnggotaController@tambah');

Route::get('/ukm/dashboard/Kelola-Anggota', 'AnggotaController@kAnggota');
Route::get('/ukm/dashboard/Kelola-Anggota/del={ID}', 'AnggotaController@hapus');

Route::get('/ukm/dashboard/Kelola-Anggota/edit={ID}', 'AnggotaController@eAnggota');
Route::post('/ukm/dashboard/Kelola-Anggota/edit={ID}', 'AnggotaController@edit')->name('edit');


Route::get('/ukm/dashboard/Tambah-Pengurus', 'PengurusController@tPengurus');
Route::post('/ukm/dashboard/Tambah-Pengurus/proses', 'PengurusController@tambah');

Route::get('/ukm/dashboard/Kelola-Pengurus', 'PengurusController@kPengurus');
Route::get('/ukm/dashboard/Kelola-Pengurus/del={ID}', 'PengurusController@hapus');

Route::get('/ukm/dashboard/Kelola-Pengurus/edit={ID}', 'PengurusController@ePengurus');
Route::post('/ukm/dashboard/Kelola-Pengurus/edit={ID}', 'PengurusController@edit')->name('edit');

Route::get('/ukm/dashboard/ubah-pass', 'LoginController@ubah');
Route::post('/ukm/dashboard/reset', 'LoginController@reset');