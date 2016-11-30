<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('', function (){
   redirect('auth/login');
});
Route::get('get', 'PhrasesController@GetPhrase');
Route::get('send', 'PhrasesController@SendPhrases')->middleware('auth');
Route::post('send', 'PhrasesController@StorePhrases')->middleware('auth');
Route::get('aguardando', 'PhrasesController@ListWaitAprovation')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
