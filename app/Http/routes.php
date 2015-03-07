<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('vote', 'VoteController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('candidates', 'CandidatesController');

Route::resource('voters', 'VotersController');

Route::resource('candidates.voters', 'VotersController');

Route::bind('voters', function($value, $route) {
    return App\Voter::whereId($value)->first();
});
Route::bind('projects', function($value, $route) {
    return App\Candidate::whereId($value)->first();
});