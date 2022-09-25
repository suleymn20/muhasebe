<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/panel','Back\Dashboard@index')->name('admin.dashboard');
Route::get('admin/giris','Back\Auth@login')->name('admin.login');

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/','Front\Homepage@index')->name('homepage');
Route::get('/iletisim','Front\Homepage@contact')->name('contact');
Route::post('iletisim','Front\Homepage@contactpost')->name('contact.post');
Route::get('/kategori/{category}','Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}','Front\Homepage@single')->name('single');
Route::get('/{sayfa}','Front\Homepage@page')->name('page');
