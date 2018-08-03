<?php

Route::get('/', 'LeadsController@index')->name('home');
Route::redirect('/leads', '/', 301);

Route::get('/leads/create', 'LeadsController@create');
Route::post('/leads', 'LeadsController@store');
Route::delete('/leads/{id}', 'LeadsController@destroy')->middleware('auth');


Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');
