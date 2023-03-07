<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/link', function(){
    return app('files')->link(storage_path('app'), public_path('storage'));
});

//route CRUD
Route::get('/', [PegawaiController::class, "index"])->name('pegawai');
Route::get('/pegawai/tambah', [PegawaiController::class, "tambah"])->name('tambah');
Route::post('/pegawai/store', [PegawaiController::class, "store"])->name('store');
Route::get('/upload-foto', [UploadController::class, "upload"])->name('upload');

Route::get('/pegawai/edit/{id}', [PegawaiController::class, "edit"])->name('edit');
Route::post('/pegawai/update', [PegawaiController::class, "update"])->name('update');
Route::get('/pegawai/hapus/{id}', [PegawaiController::class, "hapus"])->name('hapus');