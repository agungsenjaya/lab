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

// Route::GET('/', function () {
//     return view('welcome');
// });
Route::GET('/','ClientController@index')->name('index');

Auth::routes(['register' => false]);

Route::GROUP(['prefix' => 'admin',  'middleware' => ['role:admin']], function(){
    Route::GET('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::GET('/pasien', 'AdminController@pasien')->name('admin.pasien');
    Route::GET('/pasien/search', 'AdminController@pasien_search')->name('admin.pasien_search');
    Route::GET('/pasien/new', 'AdminController@pasien_new')->name('admin.pasien_new');
    Route::POST('/pasien/new/store', 'AdminController@pasien_store')->name('admin.pasien_store');
    Route::GET('/pasien/detail/{id}', 'AdminController@pasien_detail')->name('admin.pasien_detail');
    Route::GET('/diagnosa/{id}', 'AdminController@diagnosa')->name('admin.diagnosa');
});
Route::GROUP(['prefix' => 'superadmin',  'middleware' => ['role:superadmin']], function(){
    Route::GET('/dashboard', 'SuperController@index')->name('dashboard.super');
    Route::GET('/pasien', 'SuperController@pasien')->name('super.pasien');
    Route::GET('/pasien/search', 'SuperController@pasien_search')->name('super.pasien_search');
    Route::GET('/diagnosa/{id}', 'SuperController@diagnosa')->name('super.diagnosa');
    Route::GET('/pasien/detail/{id}', 'SuperController@pasien_detail')->name('super.pasien_detail');
    Route::GET('/dokter', 'SuperController@dokter')->name('super.dokter');
    Route::GET('/dokter/edit/{id}', 'SuperController@dokter_edit')->name('super.dokter_edit');
    Route::GET('/dokter/update/{id}', 'SuperController@dokter_update')->name('super.dokter_update');
    Route::GET('/dokter/new', 'SuperController@dokter_new')->name('super.dokter_new');
    Route::POST('/dokter/store', 'SuperController@dokter_store')->name('super.dokter_store');
});
Route::GROUP(['prefix' => 'owner',  'middleware' => ['role:owner']], function(){
    Route::GET('/dashboard', 'OwnerController@index')->name('dashboard.owner');
});