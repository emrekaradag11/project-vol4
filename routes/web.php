<?php

use Illuminate\Support\Facades\Route;

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
});



Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'back\adminController@get_index')->name("admin.index");
    Route::post('/change_lang',"back\adminController@set_langs");
    Route::get('/options', 'back\adminController@get_options');
    Route::post('/options', 'back\adminController@post_options');
    Route::resource('pages', 'back\pageController');
    Route::resource('text', 'back\textController');


    /* ek alanlar */
    Route::post("/addfield","back\addFieldController@setFields")->name("setField");
    Route::post("/updateFields","back\addFieldController@updateFields")->name("updateFields");
    Route::post("/getFieldWithPageId","back\addFieldController@getFieldWithPageId")->name("getFieldWithPageId");
    Route::post("/getFieldWithId","back\addFieldController@getFieldWithId")->name("getFieldWithId");
    Route::get('/deleteField/{id?}', 'back\addFieldController@deleteField')->name("deleteField");

    /* ek alan dataları */
    Route::post("/setFieldData","back\\fieldDataController@setFieldData")->name("setFieldData");

    /* gorsel router'lari */
    Route::post('setImages', 'back\imgController@setImg')->name("setImg");
    Route::post('deleteImages', 'back\imgController@deleteImg')->name("deleteImg");

    /* tree router'lari */
    Route::resource('tree', 'back\treeController');
    Route::get('/tree/create/{page_id?}', 'back\treeController@create');
    Route::get('/tree/{id?}/edit/{page_id?}', 'back\treeController@edit');


    Route::post('/sortable', 'back\pageController@sortable')->name('admin.sortable');


});
