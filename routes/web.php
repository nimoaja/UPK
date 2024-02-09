<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\penjualanController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\stokkeluarController;
use App\Http\Controllers\stokmasukcontroller;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('penjualan', [penjualanController::class, 'halaman_penjualan'])->name('halamanpenjualan');
Route::post('Penjualan', [penjualanController::class, 'jual'])->name('jual');
Route::put('/editpenjualan/{id}', [penjualanController::class, 'updatePenjualan'])->name('updatepenjualan');
Route::delete('hapuspenjualan/{id}', [penjualanController::class, 'hapusPenjualan'])->name('hapuspenjualan');

Route::get('pembeli', [PembeliController::class, 'halaman_pembeli'])->name('halamanpembeli');
Route::get('pembeli', [PembeliController::class, 'halaman_pembeli'])->name('halamanpembeli');

Route::post('pembeli', [pembelicontroller::class, 'pembeli'])->name('pembeli');
Route::put('/editpembeli/{id}', [Pembelicontroller::class, 'updatepembeli'])->name('updatepembeli');
Route::delete('/hapuspembeli/{id}', [PembeliController::class, 'hapusPembeli'])->name('hapuspembeli');

Route::get('stokmasuk', [stokmasukcontroller::class, 'stok_masuk'])->name('stokmasuk');
Route::post('stokmasuk', [stokmasukController::class, 'stok'])->name('stok');
Route::put('/editstok/{id}', [stokmasukController::class, 'updatestok'])->name('stokupdate');
Route::delete('/hapusstok/{id}', [stokmasukController::class, 'hapusstok'])->name('hapusstok');

Route::get('stokkeluar', [stokkeluarcontroller::class, 'stok_keluar'])->name('stokkeluar');
Route::post('stokkeluar', [stokkeluarController::class, 'stokkeluar'])->name('keluar');
Route::put('/editstokkeluar/{id}', [stokkeluarController::class, 'updatestokkeluar'])->name('stokkeluarupdate');
Route::delete('/hapusstokkeluar/{id}', [stokkeluarController::class, 'hapusstokkeluar'])->name('hapusstokkeluar');

Route::get('/kategori', [KategoriController::class, 'kategoriproduks'])->name('kategoriproduk');
Route::post('/tambah-kategori', [KategoriController::class, 'store'])->name('tambahKategori');
Route::post('/editkategori/{id}', [KategoriController::class, 'updatekategori'])->name('kategoriupdate');
Route::get('/hapuskategori/{id}', [KategoriController::class, 'deleteKategori'])->name('hapuskategori');
