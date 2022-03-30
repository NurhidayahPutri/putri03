<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/biodata', 'HomeController@bio');

    Route::get('/barang', 'ControllerBarang@barang');
    Route::get('/tambahbarang', 'ControllerBarang@tambah');
    Route::post('/simpanbarang', 'ControllerBarang@simpan');
    Route::get('/editbarang/{id}', 'ControllerBarang@edit');
    Route::post('/updatebarang/{id}', 'ControllerBarang@update');
    Route::get('/deletebarang/{id}', 'ControllerBarang@delete');

    Route::get('/satuan', 'ControllerSatuan@satuan');
    Route::get('/tambahsatuan', 'ControllerSatuan@tambah');
    Route::post('/simpansatuan', 'ControllerSatuan@simpan');
    Route::get('/editsatuan/{id}', 'ControllerSatuan@edit');
    Route::post('/updatesatuan/{id}', 'ControllerSatuan@update');
    Route::get('/deletesatuan/{id}', 'ControllerSatuan@delete');

    Route::get('/pemasok', 'ControllerPemasok@Pemasok');
    Route::get('/tambahpemasok', 'ControllerPemasok@tambah');
    Route::post('/simpanpemasok', 'ControllerPemasok@simpan');
    Route::get('/editpemasok/{id}', 'ControllerPemasok@edit');
    Route::post('/updatepemasok/{id}', 'ControllerPemasok@update');
    Route::get('/deletepemasok/{id}', 'ControllerPemasok@delete');

    Route::get('/beli', 'ControllerBeli@Beli');
    Route::get('/tambahbeli', 'ControllerBeli@tambah');
    Route::post('/simpanbeli', 'ControllerBeli@simpan');
    Route::get('/editbeli/{id}', 'ControllerBeli@edit');
    Route::post('/mutasisimpan', 'ControllerBeli@mutasisimpan');
    Route::get('/mutasihapus/{id}', 'ControllerBeli@mutasihapus');
    Route::get('/printbeli/{nobukti}', 'ControllerBeli@printbeli');
    Route::get('/deletebeli/{id}', 'ControllerBeli@hapus');
});
