<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('root');

Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
//Route::get('register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
//Route::post('register', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::group(['as'=>'admin.', 'namespace'=>'Admin', 'prefix'=>'admin'], function(){
    Route::get('/', ['as'=>'root', 'uses'=>'IndexController@index']);
    Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'IndexController@index']);
    Route::get('tolerances', ['as'=>'tolerances.index', 'uses'=>'ToleranceController@index']);
    Route::get('api/v1/tolerances', ['as'=>'api.v1.tolerances.grid', 'uses'=>'ToleranceController@getList']);
    Route::get('api/v1/systems', ['as'=>'api.v1.systems.list', 'uses'=>'ToleranceController@getSystems']);
    Route::get('api/v1/ranges', ['as'=>'api.v1.ranges.list', 'uses'=>'ToleranceController@getRanges']);
    Route::get('api/v1/qualities', ['as'=>'api.v1.qualities.list', 'uses'=>'ToleranceController@getQualities']);
    Route::get('api/v1/fields', ['as'=>'api.v1.fields.list', 'uses'=>'ToleranceController@getFields']);
    Route::post('api/v1/tolerances', ['as'=>'api.v1.tolerances.save', 'uses'=>'ToleranceController@postSave']);
});
Route::group(['namespace'=>'Admin', 'prefix'=>'admin'], function(){
    Route::resource('ranges', 'RangeController', ['except'=>['show']]);
    Route::resource('qualities', 'QualityController', ['except'=>['show']]);
    Route::resource('fields', 'FieldController', ['except'=>['show']]);
    // Route::resource('tolerances', 'ToleranceController');
});
