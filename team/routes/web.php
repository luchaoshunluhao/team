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
//
//Route::get('/', function () {
//
//    return view('admin/sportsman/index');
//
//});


Route::group(['prefix' => 'admin'], function(){

    Route::get('index/index', 'Admin\IndexController@index')->name('index_index');
    Route::get('index/welcome', 'Admin\IndexController@welcome')->name('index_welcome');
    Route::get('matchdata/index', 'Admin\MatchdataController@index')->name('matchdata_index');
    Route::any('matchdata/add', 'Admin\MatchdataController@add')->name('matchdata_add');
    Route::any('matchdata/edit', 'Admin\MatchdataController@edit')->name('matchdata_edit');
    Route::get('matchdata/del', 'Admin\MatchdataController@del')->name('matchdata_del');


    Route::any('Sportsman/index','Admin\SportsmanController@index')->name('Sportsman_index');
    Route::any('Sportsman/add','Admin\SportsmanController@add')->name('Sportsman_add');
    Route::any('Sportsman/edit','Admin\SportsmanController@edit')->name('Sportsman_edit');

//    Route::post('uploader/webuploader', 'Admin\UploaderController@webuploader') -> name('webuploader');

    Route::any('Manager/index','Admin\ManagerController@index')->name('Manager_index');
    Route::any('Manager/add','Admin\ManagerController@add')->name('Manager_add');
    Route::any('Manager/show','Admin\ManagerController@show')->name('Manager_show');
    Route::any('Manager/edit','Admin\ManagerController@edit')->name('Manager_edit');


});
