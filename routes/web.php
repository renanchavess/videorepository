<?php
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('index');

Route::resources(['video' => 'VideoController']);
Route::resources(['tag' => 'TagController']);
