<?php

Route::get('/', ['as' => 'home', 'uses' => 'SiteController@showMessages']);
