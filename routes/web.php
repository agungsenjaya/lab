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

Auth::routes([
    'register' => false,
    'reset' => false,
    'request' => false,
]);

Route::GROUP(['prefix' => 'admin',  'middleware' => ['role:admin']], function(){
   
    Route::GET('/dashboard', 'AdminController@index')->name('admin.dashboard');
   
    Route::GET('/dokter', 'AdminController@dokter')->name('admin.dokter');
   
    Route::GET('/information', 'AdminController@info')->name('admin.info');
    
    Route::GET('/pasien', 'AdminController@pasien')->name('admin.pasien');
    Route::GET('/pasien/search', 'AdminController@pasien_search')->name('admin.pasien_search');
    Route::GET('/pasien/new', 'AdminController@pasien_new')->name('admin.pasien_new');
    Route::POST('/pasien/new/store', 'AdminController@pasien_store')->name('admin.pasien_store');
    Route::GET('/pasien/detail/{id}', 'AdminController@pasien_detail')->name('admin.pasien_detail');
    
    Route::GET('/diagnosa/{id}', 'AdminController@diagnosa')->name('admin.diagnosa');
    Route::GET('/cetak/{id}', 'AdminController@cetak')->name('admin.cetak');
});

Route::GROUP(['prefix' => 'superadmin',  'middleware' => ['role:superadmin']], function(){
    
    Route::GET('/dashboard', 'SuperController@index')->name('dashboard.super');
    
    Route::GET('/pasien', 'SuperController@pasien')->name('super.pasien');
    Route::GET('/pasien/search', 'SuperController@pasien_search')->name('super.pasien_search');
    Route::GET('/pasien/detail/{id}', 'SuperController@pasien_detail')->name('super.pasien_detail');
    
    Route::GET('/diagnosa/{id}', 'SuperController@diagnosa')->name('super.diagnosa');
    
    Route::GET('/dokter', 'SuperController@dokter')->name('super.dokter');
    Route::GET('/dokter/edit/{id}', 'SuperController@dokter_edit')->name('super.dokter_edit');
    Route::POST('/dokter/update/{id}', 'SuperController@dokter_update')->name('super.dokter_update');
    Route::GET('/dokter/new', 'SuperController@dokter_new')->name('super.dokter_new');
    Route::POST('/dokter/store', 'SuperController@dokter_store')->name('super.dokter_store');

    Route::GET('/user', 'SuperController@user')->name('super.user');
    Route::GET('/user/delete/{id}', 'SuperController@user_delete')->name('super.user_delete');
    Route::GET('/user/edit/{id}', 'SuperController@user_edit')->name('super.user_edit');
    Route::POST('/user/update/{id}', 'SuperController@user_update')->name('super.user_update');
    Route::GET('/user/new', 'SuperController@user_new')->name('super.user_new');
    Route::POST('/user/store', 'SuperController@user_store')->name('super.user_store');
    
    // Route::GET('/formula', 'SuperController@formula')->name('super.formula');
    // Route::GET('/formula/edit/{id}', 'SuperController@formula_edit')->name('super.formula_edit');
    // Route::POST('/formula/update/{id}', 'SuperController@formula_update')->name('super.formula_update');
    // Route::GET('/formula/new', 'SuperController@formula_new')->name('super.formula_new');
    // Route::POST('/formula/store', 'SuperController@formula_store')->name('super.formula_store');
    
    Route::GET('/price', 'SuperController@price')->name('super.price');

    Route::GET('/account', 'SuperController@account')->name('super.account');
    
    Route::GET('/cabang', 'SuperController@cabang_detail')->name('super.cabang_detail');
    
    Route::GET('/laporan', 'SuperController@laporan')->name('super.laporan');

    Route::GET('/cetak/{id}', 'SuperController@cetak')->name('super.cetak');
});

Route::GROUP(['prefix' => 'owner',  'middleware' => ['role:owner']], function(){
    
    Route::GET('/dashboard', 'OwnerController@index')->name('dashboard.owner');
    
    Route::GET('/nilai', 'OwnerController@nilai')->name('owner.nilai');
    Route::GET('/nilai/edit/{id}', 'OwnerController@nilai_edit')->name('owner.nilai_edit');
    Route::POST('/nilai/update/{id}', 'OwnerController@nilai_update')->name('owner.nilai_update');

    Route::GET('/user', 'OwnerController@user')->name('owner.user');
    Route::GET('/user/delete/{id}', 'OwnerController@user_delete')->name('owner.user_delete');
    Route::GET('/user/edit/{id}', 'OwnerController@user_edit')->name('owner.user_edit');
    Route::POST('/user/update/{id}', 'OwnerController@user_update')->name('owner.user_update');
    Route::GET('/user/new', 'OwnerController@user_new')->name('owner.user_new');
    Route::POST('/user/store', 'OwnerController@user_store')->name('owner.user_store');
    
    Route::GET('/cabang', 'OwnerController@cabang')->name('owner.cabang');
    Route::GET('/cabang/edit/{id}', 'OwnerController@cabang_edit')->name('owner.cabang_edit');
    Route::GET('/cabang/detail/{id}', 'OwnerController@cabang_detail')->name('owner.cabang_detail');
    Route::POST('/cabang/update/{id}', 'OwnerController@cabang_update')->name('owner.cabang_update');
    Route::GET('/cabang/new', 'OwnerController@cabang_new')->name('owner.cabang_new');
    Route::POST('/cabang/store', 'OwnerController@cabang_store')->name('owner.cabang_store');

    Route::GET('/cabang/laporan/{id}', 'OwnerController@laporan')->name('owner.laporan');

    Route::GET('/account', 'OwnerController@account')->name('owner.account');
    Route::GET('/pricing', 'OwnerController@pricing')->name('owner.pricing');
    Route::GET('/pasien', 'OwnerController@pasien')->name('owner.pasien');

    Route::GET('/excel/klinik','OwnerController@excel_klinik')->name('excel.klinik');
    Route::GET('/excel/dokter','OwnerController@excel_dokter')->name('excel.dokter');
    Route::GET('/cetak/klinik','OwnerController@cetak_klinik')->name('cetak.klinik');
    Route::GET('/cetak/dokter','OwnerController@cetak_dokter')->name('cetak.dokter');

});