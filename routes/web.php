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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//route CRUD Mahasiswa
Route::get('/mahasiswa','MahasiswaController@index');
Route::get('/mahasiswa/tambah','MahasiswaController@tambah');
Route::post('/mahasiswa/insert','MahasiswaController@insert');
Route::get('/mahasiswa/edit/{id}','MahasiswaController@edit');
Route::put('/mahasiswa/update/{id}', 'MahasiswaController@update');
Route::get('/mahasiswa/hapus/{id}', 'MahasiswaController@delete');
//route CRUD Manajemen user
Route::get('/manajemenuser','ManajemenuserController@index');
Route::get('/manajemenuser/json','ManajemenuserController@json');
Route::get('/manajemenuser/daftar','ManajemenuserController@daftar');
Route::post('/manajemenuser/insert','ManajemenuserController@insert');
Route::get('/manajemenuser/edit/{id}','ManajemenuserController@edit');
Route::put('/manajemenuser/update/{id}', 'ManajemenuserController@update');
ROUTE::DELETE('/manajemenuser/hapus/{id}', 'ManajemenuserController@delete');
//route CRUD kategori barang
Route::get('/kategori','KategoriController@index');
Route::get('/kategori/json','KategoriController@json');
Route::get('/kategori/tambah','KategoriController@tambah');
Route::post('/kategori/insert','KategoriController@insert');
Route::get('/kategori/edit/{id}','KategoriController@edit');
Route::put('/kategori/update/{id}', 'KategoriController@update');
ROUTE::DELETE('/kategori/hapus/{id}', 'KategoriController@delete');
//route CRUD tb_barang
Route::get('/barang','BarangController@index');
Route::get('/barang/json','BarangController@json');
Route::get('/barang/tambah','BarangController@tambah');
Route::post('/barang/insert','BarangController@insert');
Route::get('/barang/edit/{id}','BarangController@edit');
Route::put('/barang/update/{id}', 'BarangController@update');
ROUTE::DELETE('/barang/hapus/{id}', 'BarangController@delete');
//route report
Route::get('/report','ReportController@index');
Route::get('/report/json','ReportController@json');
Route::get('/report/cetak_pdf', 'ReportController@cetak_pdf');