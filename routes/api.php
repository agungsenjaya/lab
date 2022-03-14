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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
});

Route::GET('/v1/pasiens', 'ApiController@pasiens');
Route::GET('/v1/formulas/{id}', 'ApiController@formulas');
Route::POST('/v1/formulas/price', 'ApiController@formula_price');
Route::GET('/v1/pasiens/{id}', 'ApiController@pasiens_search');