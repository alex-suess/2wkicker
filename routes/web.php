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

Route::get('/new-color', [
    'uses' => 'ColorController@newColor',
    'as' => 'new-color'
])->middleware('auth');

Route::post('/color-store', [
    'uses' => 'ColorController@store',
    'as' => 'color-store'
]);

Route::get('/new-player', [
		'uses' => 'SpielerController@add',
		'as' => 'new-player'
	])->middleware('auth');

Route::get('/player/{id}', [
		'uses' => 'SpielerController@show',
		'as' => 'show-player'
	]);

Route::post('/player-store', [
		'uses' => 'SpielerController@store',
		'as' => 'player-store'
	])->middleware('auth');

Route::get('/new-match', [
    'uses' => 'MatchController@add',
    'as' => 'add-match'
    ])->middleware('auth');

Route::post('/match-store', [
    'uses' => 'MatchController@store',
    'as' => 'match-store'
    ])->middleware('auth');

Route::get('/match/{id}', [
    'uses' => 'MatchController@show',
    'as' => 'show-match'
    ]);

Route::get('/', [
    'uses' => 'Controller@index',
    'as' => 'index'
]);
Route::get('/show-matches', [
    'uses' => 'MatchController@display',
    'as' => 'show-matches'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
