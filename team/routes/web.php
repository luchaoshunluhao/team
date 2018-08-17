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
Route::group(['prefix' => 'admin'], function(){
    Route::get('index/index', 'Admin\IndexController@index')->name('index_index');
    Route::get('index/welcome', 'Admin\IndexController@welcome')->name('index_welcome');
    Route::get('matchdata/index', 'Admin\MatchdataController@index')->name('matchdata_index');
    Route::any('matchdata/add', 'Admin\MatchdataController@add')->name('matchdata_add');
    Route::any('matchdata/edit', 'Admin\MatchdataController@edit')->name('matchdata_edit');
    Route::get('matchdata/del', 'Admin\MatchdataController@del')->name('matchdata_del');
});

