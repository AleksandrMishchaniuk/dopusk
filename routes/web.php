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
})->name('root');

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
//Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@getRegister']);
//Route::post('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@postRegister']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

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

    Route::resource('ranges', 'RangeController', ['except'=>['show']]);
    Route::resource('qualities', 'QualityController', ['except'=>['show']]);
    Route::resource('fields', 'FieldController', ['except'=>['show']]);
});
