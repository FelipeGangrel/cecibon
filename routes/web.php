<?php

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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// loja
Route::get('/', 'LojaController@home')->name('loja.home');
Route::get('/produtos', 'LojaController@produtos')->name('loja.produtos');
Route::get('/sobre', 'LojaController@sobre')->name('loja.sobre');
Route::get('/blog', 'LojaController@blog')->name('loja.blog');
Route::get('/contato', 'LojaController@contato')->name('loja.contato');

// Admin
Route::get('/admin', 'AdminController@index')->name('admin.home');
Route::get('/admin/usuarios', 'UserController@index')->name('admin.users');
