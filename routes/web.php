<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'TaskController@index');

Route::resource('task', 'TaskController')->except([
    'index', 'destroy'
])->middleware('auth');

Route::get('/task/del/{id}', 'TaskController@destroy');

Route::get('/', 'TaskController@index')->name('default');
Route::resource('task', 'TaskController', [
    'except' => ['create', 'show']
]);