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
    Route::GET('/pasien/new', 'AdminController@pasien_new')->name('admin.pasien_new');
    Route::POST('/pasien/new/store', 'AdminController@pasien_store')->name('admin.pasien_store');
    Route::GET('/pasien/detail/{id}', 'AdminController@pasien_detail')->name('admin.pasien_detail');
    Route::GET('/diagnosa/{id}', 'AdminController@diagnosa')->name('admin.diagnosa');
});
Route::GROUP(['prefix' => 'superadmin',  'middleware' => ['role:superadmin']], function(){
    Route::GET('/dashboard', 'SuperController@index')->name('dashboard.super');
});
Route::GROUP(['prefix' => 'owner',  'middleware' => ['role:owner']], function(){
    Route::GET('/dashboard', 'OwnerController@index')->name('dashboard.owner');
});