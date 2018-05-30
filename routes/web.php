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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('popups', 'PopupController');
Route::resource('events', 'EventController');
Route::resource('landings', 'LandingController');
Route::resource('galleries', 'GallerieController');
Route::resource('imagegalleries', 'ImagegallerieController');
Route::get('/test',function(){
    return view('template');
});
Route::get('/test1',function(){
    mkdir('../../html/public/gfx/content/gallery/huhu');
});
