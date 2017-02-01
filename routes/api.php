<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('get', 'PhrasesController@GetPhrase');

Route::get('frase', 'Api\Phrases@GetPhrase')->middleware('auth:api');

Route::get('justMy', 'PhrasesController@GetMyPhrases');