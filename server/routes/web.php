<?php

Route::get('/ajax-sample', 'AjaxController@index')->name('ajax.index');
Route::post('/ajax-sample/ajax_post', 'AjaxController@ajax_post');

Route::get('/hello', 'HelloController@index')->name('hello.index');