<?php

use Illuminate\Http\Request;

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

Route::prefix('v1')->namespace('V1')->group(function() {
    Route::get('/ranges', ['uses' => 'DopuskController@ranges']);
    Route::get('/fields', ['uses' => 'DopuskController@fields']);
    Route::get('/qualities', ['uses' => 'DopuskController@qualities']);
    Route::get('/systems', ['uses' => 'DopuskController@systems']);
    Route::get('/tolerances', ['uses' => 'DopuskController@tolerances']);

    Route::get('/ranges-limits', ['uses' => 'DopuskController@rangesLimits']);
    Route::get('/fields-qualities', ['uses' => 'DopuskController@fieldsQualities']);
    Route::get('/tolerance', ['uses' => 'DopuskController@tolerance']);
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
