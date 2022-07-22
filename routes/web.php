<?php

use Illuminate\Support\Facades\Route;

Route::resource('movies', 'MoviesController');

Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/popular', 'MoviesController@popular')->name('movies.popular');
Route::get('/toprated', 'MoviesController@toprated')->name('movies.toprated');
Route::get('/upcoming', 'MoviesController@upcoming')->name('movies.upcoming');
Route::get('/movies/{id}', 'MoviesController@show')->name('movies.store');

Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');

Route::get('/tv', 'TvController@index')->name('tv.index');
Route::get('/tv/{id}', 'TvController@show')->name('tv.show');

Route::get('/actors', 'ActorsController@index')->name('actors.index');
Route::get('/actors/page/{page?}', 'ActorsController@index');

Route::get('/actors/{id}', 'ActorsController@show')->name('actors.show');
