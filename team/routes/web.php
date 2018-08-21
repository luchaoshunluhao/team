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

Route::any('home/index/default', 'Home\IndexController@default')->name('default');
Route::any('home/index/list', 'Home\IndexController@list')->name('list');
Route::any('test', 'Api\TestController@return_data')->name('test');
Route::any('seek', 'Api\TestController@seek')->name('seek');

Route::any('admin/public/login', 'Admin\PublicController@login')->name('login');
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function(){
    Route::get('index/logout', 'Admin\IndexController@logout')->name('logout');
    Route::get('index/index', 'Admin\IndexController@index')->name('index_index');
    Route::get('index/welcome', 'Admin\IndexController@welcome')->name('index_welcome');
    Route::get('matchdata/index', 'Admin\MatchdataController@index')->name('matchdata_index');
    Route::any('matchdata/add', 'Admin\MatchdataController@add')->name('matchdata_add');
    Route::any('matchdata/edit', 'Admin\MatchdataController@edit')->name('matchdata_edit');
    Route::get('matchdata/del', 'Admin\MatchdataController@del')->name('matchdata_del');
    Route::get('matchinfo/index', 'Admin\MatchinfoController@index')->name('matchinfo_index');
    Route::any('matchinfo/add', 'Admin\MatchinfoController@add')->name('matchinfo_add');
    Route::any('matchinfo/edit', 'Admin\MatchinfoController@edit')->name('matchinfo_edit');
    Route::get('matchinfo/del', 'Admin\MatchinfoController@del')->name('matchinfo_del');
    Route::get('matchscore/index', 'Admin\MatchscoreController@index')->name('matchscore_index');
    Route::any('matchscore/add', 'Admin\MatchscoreController@add')->name('matchscore_add');
    Route::any('matchscore/edit', 'Admin\MatchscoreController@edit')->name('matchscore_edit');
    Route::get('matchscore/del', 'Admin\MatchscoreController@del')->name('matchscore_del');


    Route::any('Sportsman/index','Admin\SportsmanController@index')->name('Sportsman_index');
    Route::any('Sportsman/add','Admin\SportsmanController@add')->name('Sportsman_add');
    Route::any('Sportsman/edit','Admin\SportsmanController@edit')->name('Sportsman_edit');

    Route::post('uploader/webuploader', 'Admin\UploaderController@webuploader') -> name('webuploader');

    Route::any('Manager/index','Admin\ManagerController@index')->name('Manager_index');
    Route::any('Manager/add','Admin\ManagerController@add')->name('Manager_add');
    Route::any('Manager/show','Admin\ManagerController@show')->name('Manager_show');
    Route::any('Manager/edit','Admin\ManagerController@edit')->name('Manager_edit');

    Route::get('file/export', 'Admin\FileController@export') -> name('file_export');
    Route::any('Sportsman/import', 'Admin\FileController@import') -> name('file_import');
});
