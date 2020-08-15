<?php

Route::get('/ajax-sample', 'AjaxController@index')->name('ajax.index');
Route::post('/ajax-sample/ajax_post', 'AjaxController@ajax_post');

Route::get('/', 'HelloController@index')->name('hello.index');

Route::get('/search','HelloController@index')->name('search');