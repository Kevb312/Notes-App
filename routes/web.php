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

Route::get('/allNotes', 'NotasController@allNotes')->name('AllNotes');

Route::get('/', 'NotasController@get')->name('Notas');

Route::get('/view/{id}', 'NotasController@view')->name('NotasView');

Route::get('/delete/{id}', 'NotasController@delete')->name('NotasBorrar');

Route::post('/', 'NotasController@create')->name('NotasCrear');

Route::post('/', 'NotasController@store')->name('NotasGuardar');

Route::post('/update/{id}', 'NotasController@update')->name('NotasUpdate');

