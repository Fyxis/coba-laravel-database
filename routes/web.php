<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route CRUD
Route::get('/pegawai','\App\Http\Controller\PegawaiController@index');