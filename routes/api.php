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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
// Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::post('phone/add', 'UserController@addPhone');
    Route::post('avatar/add', 'UserController@uploadAvatar');

    // Route::get('closed', 'DataController@closed');

    /**
     * Trip Request Group
     */
    Route::group(['prefix' => 'trip'], function () {
        Route::post('request', 'UserTripController@createTrip');
        Route::get('/', 'UserTripController@getUserTrips');
    });

    Route::group(['prefix' => 'location'], function () {
        Route::get('/', 'UserController@getLocations');
        Route::post('/add', 'UserController@addLocation');
    });
});




/**
 * Driver Routes
 */

Route::group(['prefix' => 'driver'], function () {
    Route::post('login', 'DriverController@authenticate');

    Route::group(['middleware' => ['jwt.verify']], function () {
        
    });
});

/**
 * external admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::post('register', 'AdminController@register');
    Route::post('login', 'AdminController@authenticate');
});

Route::group(['middleware' => ['jwt.verify', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('customer', 'ReportController@getUsers');
    Route::get('driver', 'ReportController@getDrivers');

    Route::post('driver/create', 'AdminController@createDriver');

    Route::group(['prefix' => 'report'], function () {
        Route::get('summary', 'ReportController@reportSummary');
    });

    Route::group(['prefix' => 'count'], function () {
        Route::get('customer', 'ReportController@getUsersCount');
        Route::get('driver', 'ReportController@getDriversCount');
    });

    Route::group(['prefix' => 'trip'], function(){
        Route::get('/', 'AdminController@getTrips');
        Route::get('/pending', 'AdminController@getTripRequests');
        Route::get('{id}', 'AdminController@getSingleTrip');
        Route::patch('{id}', 'AdminController@assignDriver');
        Route::delete('{id}', 'AdminController@deleteTrip');
    });
});
