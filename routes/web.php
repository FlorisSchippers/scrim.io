<?php

//DB::listen(function($query) {
//	var_dump($query->sql, $query->bindings);
//});

Auth::routes();

Route::get('/', 'PagesController@home');
Route::get('/users', 'UsersController@index');
Route::get('/users/me', 'UsersController@me');
Route::get('/users/leave', 'UsersController@leaveTeam');
Route::get('/users/{user}', 'UsersController@show');

Route::get('/teams', 'TeamsController@index');
Route::get('/teams/add', 'TeamsController@addTeam');
Route::get('/teams/{team}/join', 'TeamsController@joinTeam');
Route::get('/teams/{team}', 'TeamsController@show');

Route::get('/scrims', 'ScrimsController@index');
Route::get('/scrims/add', 'ScrimsController@addScrim');
Route::get('/scrims/{scrim}', 'ScrimsController@show');

Route::post('teams', 'TeamsController@saveTeam');
Route::post('/scrims', 'ScrimsController@saveScrim');
Route::post('/scrims/{scrim}/comment', 'ScrimsController@spostComment');