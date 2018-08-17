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

    Route::any('Sportsman/index','Admin\SportsmanController@index')->name('Sportsman_index');
    Route::any('Sportsman/add','Admin\SportsmanController@add')->name('Sportsman_add');
    Route::any('Sportsman/edit','Admin\SportsmanController@edit')->name('Sportsman_edit');

//    Route::post('uploader/webuploader', 'Admin\UploaderController@webuploader') -> name('webuploader');

    Route::any('Manager/index','Admin\ManagerController@index')->name('Manager_index');
    Route::any('Manager/add','Admin\ManagerController@add')->name('Manager_add');
    Route::any('Manager/show','Admin\ManagerController@show')->name('Manager_show');
    Route::any('Manager/edit','Admin\ManagerController@edit')->name('Manager_edit');


});
