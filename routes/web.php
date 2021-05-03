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

Auth::routes();

// dashboard
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('dashboard')
        ->middleware('auth');

        Route::get('/admin_dashboard', [App\Http\Controllers\HomeController::class, 'indexadmin'])
        ->name('admin_dashboard')
        ->middleware('auth');

// end dashboard

        // Page Users

        Route::get('Admin/Users', [App\Http\Controllers\UserController::class, 'users'])
        ->name('admin.Users')
        ->middleware('is_admin');

        Route::get('Admin/Users/tambah', [App\Http\Controllers\UserController::class, 'tbuser'])
        ->name('user.tambah')
        ->middleware('is_admin');

        Route::post('Admin/Users/tambah', [App\Http\Controllers\UserController::class, 'insertUser'])
        ->name('insert.user')
        ->middleware('is_admin');

        Route::delete('Admin/Users/hapus', [App\Http\Controllers\UserController::class, 'hpsuser'])
        ->name('user.hapus')
        ->middleware('is_admin');

        Route::get('Admin/Users/edit/{id}', [\App\Http\Controllers\UserController::class, 'edituser'])
        ->name('User.edit')
        ->middleware('is_admin');

        Route::post('Admin/Users/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])
        ->name('update.user')
        ->middleware('is_admin');

        // End Page Users

        // Page Barang

        Route::get('Admin/Kelola_Barang', [App\Http\Controllers\KelolaBarangController::class, 'index'])
        ->name('admin.barang')
        ->middleware('is_admin');

        Route::get('Admin/Kelola_Barang/Tambah', [App\Http\Controllers\KelolaBarangController::class, 'tbbarang'])
        ->name('admin.barang.tambah')
        ->middleware('is_admin');

        Route::post('Admin/Kelola_Barang/Tambah', [App\Http\Controllers\KelolaBarangController::class, 'insertBarang'])
        ->name('insert.barang')
        ->middleware('is_admin');

        Route::delete('Admin/Kelola_Barang/hapus', [App\Http\Controllers\KelolaBarangController::class, 'hpsbarang'])
        ->name('barang.hapus')
        ->middleware('is_admin');

        Route::get('Admin/Kelola_Barang/edit/{id}', [\App\Http\Controllers\KelolaBarangController::class, 'editBarang'])
        ->name('barang.edit')
        ->middleware('is_admin');

        Route::post('Admin/Kelola_Barang/edit/{id}', [App\Http\Controllers\KelolaBarangController::class, 'update'])
        ->name('update.barang')
        ->middleware('is_admin');

        // End Page Barang

        // Page Kategori
        Route::get('Admin/Kelola_Kategori', [App\Http\Controllers\KategoriBarangController::class, 'index'])
        ->name('admin.kategori')
        ->middleware('is_admin');

        Route::get('Admin/Kelola_Kategori/Tambah', [App\Http\Controllers\KategoriBarangController::class, 'tbkategori'])
        ->name('admin.kategori.tambah')
        ->middleware('is_admin');

        Route::post('Admin/Kelola_Kategori/Tambah', [App\Http\Controllers\KategoriBarangController::class, 'insertKategori'])
        ->name('insert.kategori')
        ->middleware('is_admin');

        Route::delete('Admin/Kelola_Kategori/hapus', [App\Http\Controllers\KategoriBarangController::class, 'hpscategory'])
        ->name('kategori.hapus')
        ->middleware('is_admin');

        Route::get('Admin/Kelola_Kategori/edit/{id}', [\App\Http\Controllers\KategoriBarangController::class, 'editKategori'])
        ->name('kategori.edit')
        ->middleware('is_admin');

        Route::post('Admin/Kelola_Kategori/edit/{id}', [App\Http\Controllers\KategoriBarangController::class, 'update'])
        ->name('update.kategori')
        ->middleware('is_admin');

        // End Page Kategori

        // Page Brand
        Route::get('Admin/Kelola_Merk', [App\Http\Controllers\MerekBarangController::class, 'index'])
        ->name('admin.merk')
        ->middleware('is_admin');

        Route::get('Admin/Kelola_Merk/Tambah', [App\Http\Controllers\MerekBarangController::class, 'tbmerek'])
        ->name('admin.merk.tambah')
        ->middleware('is_admin');

        Route::post('Admin/Kelola_Merk/Tambah', [\App\Http\Controllers\MerekBarangController::class, 'insert'])
        ->name('insert')
        ->middleware('is_admin');

        Route::delete('Admin/Kelola_Merk/hapus', [\App\Http\Controllers\MerekBarangController::class, 'hpsmerk'])
        ->name('merk.hapus')
        ->middleware('is_admin');

        Route::get('Admin/Kelola_Merk/edit/{id}', [\App\Http\Controllers\MerekBarangController::class, 'editMerek'])
        ->name('merk.edit')
        ->middleware('is_admin');

        Route::post('Admin/Kelola_Merk/edit/{id}', [App\Http\Controllers\MerekBarangController::class, 'update'])
        ->name('update.merk')
        ->middleware('is_admin');

        // Laporan

        Route::get('Admin/LaporanMasuk', [\App\Http\Controllers\LaporanController::class, 'indexmasuk'])
        ->name('laporan.masuk')
        ->middleware('is_admin');

        
        Route::get('Admin/LaporanKeluar', [\App\Http\Controllers\LaporanController::class, 'indexkeluar'])
        ->name('laporan.keluar')
        ->middleware('is_admin');

        Route::get('Admin/LaporanMasuk/printMasuk', [\App\Http\Controllers\LaporanController::class, 'printMasuk'])
        ->name('admin.print.masuk')
        ->middleware('is_admin');

        Route::get('Admin/LaporanMasuk/printKeluar', [\App\Http\Controllers\LaporanController::class, 'printKeluar'])
        ->name('admin.print.keluar')
        ->middleware('is_admin');
        // beli

        Route::get('dashboard/beli/{id}', [\App\Http\Controllers\HomeController::class, 'indexbeli'])
        ->name('indexbeli')
        ->middleware('auth');

        Route::post('dashboard/beli/{id}', [App\Http\Controllers\HomeController::class, 'beli'])
        ->name('beli')
        ->middleware('auth');