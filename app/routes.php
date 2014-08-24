<?php

Route::get('/', ['as' => 'home', 'uses' => 'SiteController@showMessages']);
Route::get('schedule', ['as' => 'schedule', 'uses' => 'SiteController@showSchedule']);
