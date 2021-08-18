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

Route::get('/', 'RegisterController@index');
Route::get('/login', 'LoginController@index');
Route::get('/logout','LoginController@logout');
Route::post('/register/save','RegisterController@save');
Route::post('/login/save','LoginController@login');

Route::get('/create/note/{id}/{p_id}','NoteController@index');
Route::post('/create','NoteController@create');
Route::get('/manage/note/{id}','NoteController@manage');
Route::post('/note/edit','NoteController@noteedit');
Route::post('/update','NoteController@update');
Route::get('/note/delete/{id}','NoteController@delete');