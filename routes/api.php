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

// Route API per l'autenticazione
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('getAuthUser', 'AuthController@user');
    });
});


// Route API per la gestione delle presenze
Route::group(['prefix' => 'presences'], function () {
	Route::get('getAllPresences', 'PresenceController@getPresences');
	Route::get('getSpecificUserPresences', 'PresenceController@getSpecificUserPresences');
	Route::post('insertPresence', 'PresenceController@insertPresence');
	Route::put('updatePresence', 'PresenceController@updatePresence');
	Route::delete('deletePresence', 'PresenceController@deletePresence');
});


// Route API per la gestione degli utenti
Route::group(['prefix' => 'users'], function () {
	Route::get('getAllUsers', 'UsersController@getAllUsers');
});
