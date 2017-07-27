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
Route::group(['middleware' => ['web']], function () {
    Route::get('/', array('uses'=>'IndexController@index'));
	Route::get('/music/{genre?}',array('as'=>'music','uses'=>'MusicController@index'));
	Route::get('/fetchmusic',array('uses'=>'MusicController@fetchAllMusic'));
	
	Route::get('/addtoplaylist', array('uses'=>'MusicController@addMusicToPlaylist'));
	Route::get('/createplaylist',array('uses'=>'MusicController@createPlaylist'));
	Route::get('/musicplaylist',array('uses'=>'MusicController@indexPlaylist'));


	Route::get('/video/{category?}',array('as'=>'video','uses'=>'VideoController@index'))->where('page', '[1-9]+[0-9]*');
	Route::get('/watchvideo/{category?}/{filename?}',array('as'=>'watchvideo','uses'=>'VideoController@watchVideo'));


});

