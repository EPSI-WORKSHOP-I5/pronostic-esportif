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

Route::prefix('/spa')->group(function () {
    Route::prefix('/games')->group(function () {
        Route::get('/', 'GamesController@getAll');
        Route::post('/', 'GamesController@create');
        Route::put('/{game}', 'GamesController@update');

        Route::prefix('/{game}')->group(function () {
            Route::get('/', 'GamesController@getAll');

            Route::prefix('/tournaments')->group(function () {
                Route::get('/', 'TournamentsController@getAll');
                Route::post('/', 'TournamentsController@create');
            });

            Route::prefix('/teams')->group(function () {
                Route::get('/', 'TeamsController@getAll');
                Route::post('/', 'TeamsController@create');
            });
        });
    });

    Route::prefix('/tournaments')->group(function () {

        Route::prefix('/{tournament}')->group(function () {
            Route::get('/', 'TournamentsController@get');

            Route::prefix('matches')->group(function () {
                Route::get('/', 'MatchesController@getByTournament');
                Route::post('/', 'MatchesController@create');
            });

            Route::get('teams', 'TeamsController@getByTournament');
        });

        Route::put('/{tournament}', 'TournamentsController@update');
    });

    Route::prefix('/teams')->group(function () {
        Route::get('/{team}', 'TeamsController@get');
        Route::put('/{team}', 'TeamsController@update');
    });

    Route::prefix('/matches')->group(function () {
        Route::get('/{match}', 'MatchesController@get');
        Route::put('/{match}', 'MatchesController@update');
    });
});