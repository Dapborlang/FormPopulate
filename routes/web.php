<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('formpopulate','FormPopulateController');
Route::get('formpopulateall','FormPopulateController@resources');
Route::resource('formpopulateindex','FormPopulateIndexController');

Route::get('formbuilder/{id}','FormBuilderController@index');
Route::get('formbuilder/{id}/create','FormBuilderController@create');
Route::post('formbuilder/{id}','FormBuilderController@store');
Route::post('formbuilder/{id}/index','FormBuilderController@index');

Route::get('frmbuilder/{id}/{cid}','FormBuilderController@show');
Route::get('frmbuilder/edit/{id}/{cid}','FormBuilderController@edit');
Route::put('frmbuilder/update/{id}/{cid}','FormBuilderController@update');

//storage
Route::resource('stg','FileStorageController');

//..................Pages
Route::get('{id}/pages','PageController@show');
