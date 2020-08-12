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

    Route::post("/addfield","addFieldController@setFields")->name("setField");
    Route::post('setField', 'fieldDataController@setData')->name("setFieldData");
    Route::post('/sortable', 'page_controller@sortable')->name('admin.sortable');

    /*

        Route::resource('users', 'userController');
        Route::post("/addfield","addFieldController@setFields")->name("setField");
        Route::post('setField', 'fieldDataController@setData')->name("setFieldData");
        Route::post('setImages', 'imgController@setImg')->name("setImg");
        Route::post('deleteImages', 'imgController@deleteImg')->name("deleteImg");
        Route::resource('tree', 'treeController');
        Route::get('/tree/create/{page_id?}', 'treeController@create');
        Route::get('/tree/{id?}/edit/{page_id?}', 'treeController@edit');
        Route::post('/sortable', 'page_controller@sortable')->name('admin.sortable');

    */
});
