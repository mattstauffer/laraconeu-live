<?php

Route::get('/', ['as' => 'home', 'uses' => 'SiteController@showMessages']);

Route::group(['prefix' => 'admin', 'before' => 'auth.basic'], function() {
    Route::get('/', ['as' => 'admin', 'uses' => 'MessagesController@index']);
    Route::get('messages/create', ['as' => 'message.create', 'uses' => 'MessagesController@create']);
    Route::post('messages', ['as' => 'message.store', 'uses' => 'MessagesController@store']);
    Route::get('messages/{id}/edit', ['as' => 'message.edit', 'uses' => 'MessagesController@edit']);
    Route::put('messages/{id}', ['as' => 'message.update', 'uses' => 'MessagesController@update']);
    Route::get('messages/{id}/delete', ['as' => 'message.delete', 'uses' => 'MessagesController@delete']);
    Route::delete('messages/{id}', ['as' => 'message.destroy', 'uses' => 'MessagesController@destroy']);

    Route::get('users', ['as' => 'users', 'uses' => 'UsersController@index']);
    Route::get('users/create', ['as' => 'user.create', 'uses' => 'UsersController@create']);
    Route::post('users', ['as' => 'user.store', 'uses' => 'UsersController@store']);
    Route::get('users/{id}/edit', ['as' => 'user.edit', 'uses' => 'UsersController@edit']);
    Route::put('users/{id}', ['as' => 'user.update', 'uses' => 'UsersController@update']);
    Route::get('users/{id}/delete', ['as' => 'user.delete', 'uses' => 'UsersController@delete']);
    Route::delete('users/{id}', ['as' => 'user.destroy', 'uses' => 'UsersController@destroy']);
});
