<?php

Route::group(['middleware' => ['api']], function() {
  Route::get('/books', 'BookController@index');
  Route::get('/books/{id}', 'BookController@show');
  Route::post('/books', 'BookController@store');
  Route::post('/books', 'BookController@store');
  Route::put('/books/{id}', 'BookController@update');
  Route::delete('/books/{id}', 'BookController@destroy');
});