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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('games')->group(function () {
    Route::get('/', 'GamesController@getAll');
    Route::get('/{game}', 'GamesController@get');
    Route::post('/', 'GamesController@create');
    Route::put('/{game}', 'GamesController@update');

    Route::prefix('tournaments')->group(function () {
        Route::get('/', 'TournamentsController@getAll');
        Route::get('/{tournament}', 'TournamentsController@get');
        Route::post('/', 'TournamentsController@create');
        Route::put('/{tournament}', 'TournamentsController@update');

        Route::prefix('matches')->group(function () {
            Route::get('/', 'MatchesController@getAll');
            Route::get('/{match}', 'MatchesController@get');
            Route::post('/', 'MatchesController@create');
            Route::put('/{match}', 'MatchesController@update');
        });
    });

    Route::prefix('matches')->group(function () {
        Route::get('/', 'MatchesController@getAll');
        Route::get('/{match}', 'MatchesController@get');
    });
});