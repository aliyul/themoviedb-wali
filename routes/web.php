<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'MoviesLocalController@index')->name('localmovies.index');
Route::resource('localmovies', 'MoviesLocalController');

Route::get('localmovies/destroy/{id}', 'MoviesLocalController@destroy')->name('localmovies.destroy');

Route::resource('movies', 'MoviesController');

Route::get('/movies', 'MoviesController@index')->name('movies.index');
//Route::get('/movies/store', 'MoviesController@index')->name('movies.store');

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
