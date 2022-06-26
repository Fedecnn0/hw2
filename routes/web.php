<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CollectionController;


Route::get('/', function () {
    return redirect('login');
});

Route::post('register', 'App\Http\Controllers\RegisterController@register_form');
Route::get('register', 'App\Http\Controllers\RegisterController@index')->name('register');
Route::get('register/email/{query}', 'App\Http\Controllers\RegisterController@checkEmail');
Route::get("register/username/{q}", 'App\Http\Controllers\RegisterController@checkUsername');

Route::get('login', 'App\Http\Controllers\LoginController@login_form');
Route::post('login', 'App\Http\Controllers\LoginController@do_login');

Route::get('logout', 'App\Http\Controllers\LoginController@logout');

Route::get('contatti', 'App\Http\Controllers\HomeController@contatti');
Route::get('home', 'App\Http\Controllers\HomeController@home');

Route::get('razze', 'App\Http\Controllers\RazzeController@razze');
Route::get('api', 'App\Http\Controllers\RazzeController@api');
Route::get('remove/{breed}', 'App\Http\Controllers\RazzeController@remove');
Route::post('add', 'App\Http\Controllers\RazzeController@add');

Route::get('profile', 'App\Http\Controllers\ProfileController@profile');
Route::get('cuore', 'App\Http\Controllers\ProfileController@cuore');
Route::get('controllo/{breed}', 'App\Http\Controllers\ProfileController@controllo');
Route::get('posts', 'App\Http\Controllers\ProfileController@posts');
Route::get('rem/{cod}', 'App\Http\Controllers\ProfileController@rem');

Route::get('condividi', 'App\Http\Controllers\PostController@condividi')->name('condividi');
Route::post('condividi', 'App\Http\Controllers\PostController@createPost');
Route::post('createFoto', 'App\Http\Controllers\PostController@createFoto');

Route::get('homepage', 'App\Http\Controllers\HomePageController@homepage');
Route::get('getPost', 'App\Http\Controllers\HomePageController@getPost');
Route::post('more', 'App\Http\Controllers\HomePageController@more');
Route::get('giamipiace/{post_id}', 'App\Http\Controllers\HomePageController@giamipiace');
Route::get('remlike/{cod}', 'App\Http\Controllers\ProfileController@remlike');