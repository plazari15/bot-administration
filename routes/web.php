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
Route::get('/', function (){
   return redirect('home');
});
Route::get('all', 'PhrasesController@GetAllPhrase');
Route::get('frases/aprovadas', 'PhrasesController@GetAllPhraseApproved');
Route::get('frases/trash', 'PhrasesController@GetAllPhraseTrashed');
Route::get('delete/{id}', 'PhrasesController@DeletePhrase');
Route::get('aprove/{id}', 'PhrasesController@AprovePhrase');
Route::get('disapprove/{id}', 'PhrasesController@DisapprovePhrase');
Route::get('send', 'PhrasesController@SendPhrases')->middleware('auth');
Route::post('send', 'PhrasesController@StorePhrases')->middleware('auth');
Route::get('frases', 'PhrasesController@ListWaitAprovation')->middleware('auth');
Route::get('my', 'PhrasesController@MyPhrases')->middleware('auth');
Route::get('minhas-frases', 'PhrasesController@MyPhrasesView')->middleware('auth');
Route::get('trash', 'PhrasesController@trashView')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
