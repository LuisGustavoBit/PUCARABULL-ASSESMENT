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

route::post('/assesment','AssesmentController@store');
Route::put('/assesment', 'AssesmentController@update');
Route::delete('/assesment', 'AssesmentController@destroy');
Route::get('/assesment', 'AssesmentController@show');