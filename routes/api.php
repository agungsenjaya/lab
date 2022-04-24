<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => 'auth:api'], function(){
// });
    Route::POST('/v1/laporan_keuangan', 'ApiController@laporan_keuangan');
    Route::POST('/v1/pricing', 'ApiController@pricing');

    Route::GET('/v1/pasiens', 'ApiController@pasiens');
    Route::GET('/v1/pasiens/{id}', 'ApiController@pasiens_search');
   
    Route::GET('/v1/formulas/{id}', 'ApiController@formulas');
    Route::POST('/v1/formulas/price', 'ApiController@formula_price');
    Route::POST('/v1/formulas/price_check', 'ApiController@formula_price_check');
    Route::POST('/v1/nilai', 'ApiController@nilai');