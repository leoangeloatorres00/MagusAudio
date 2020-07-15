<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login/{website}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{website}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    if(Auth::check()){
        return redirect('/home');
    }
    return view('main.main');
});

Route::get('login',array('as'=>'login',function(){
    return redirect('/');
}));

Route::get('/science', function () {
    if(Auth::check()){
        return redirect('/home');
    }
    return view('main.science');
});

Route::get('/premium', function () {
    if(Auth::check()){
        return redirect('/home');
    }
    return view('main.premium');
});

Route::post('/premium', 'HomeController@premiumregister');

Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/admin', 'AdminController@admin')->name('admin'); 
Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin/dashboard'); 
Route::get('/admin/user', 'AdminController@user')->name('admin/user'); 
Route::get('/admin/user/create', 'AdminController@user')->name('admin/user/create'); 
Route::get('/admin/user/edit', 'AdminController@user')->name('admin/user/edit'); 

Route::get('/initial/preference', 'HomeController@preference');
Route::get('/initial/membership', 'HomeController@membership');
Route::post('/initial/membership', 'HomeController@membership');

Route::get('/home', 'AudioController@index')->name('home');
Route::get('/playlist/{playlistId}', 'AudioController@getPlaylist')->name('playlist');
Route::post('/playlist', 'AudioController@getSongList');
Route::get('/track/{playlistId}/{songId}', 'AudioController@playTrack');
Route::post('/insertHistory', 'AudioController@insertHistory');
Route::post('/getHistory', 'AudioController@getHistory');
Route::post('/downloadFile', 'AudioController@downloadFile');
