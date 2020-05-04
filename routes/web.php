<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'TaskController@index')->name('home');

Route::resource('task', 'TaskController')->except([
    'index', 'destroy', 'show'
])->middleware('auth');

Route::get('/task/{id}', 'TaskController@destroy');
