<?php

Route::get('/', ['as' => 'home', 'uses' => 'SiteController@showMessages']);

Route::group(['prefix' => 'admin', 'before' => 'auth.basic'], function() {
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);
    Route::get('message/create', ['as' => 'message.create', 'uses' => 'AdminController@create']);
    Route::post('message', ['as' => 'message.store', 'uses' => 'AdminController@store']);
    Route::get('message/{id}/edit', ['as' => 'message.edit', 'uses' => 'AdminController@edit']);
    Route::put('message/{id}', ['as' => 'message.update', 'uses' => 'AdminController@update']);
    Route::get('message/{id}/delete', ['as' => 'message.delete', 'uses' => 'AdminController@delete']);
    Route::delete('message/{id}', ['as' => 'message.destroy', 'uses' => 'AdminController@destroy']);
});
