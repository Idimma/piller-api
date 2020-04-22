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
Route::get('user/verify/{verification_code}', 'AuthController@verifyUser')->name('user.verify');
// Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::post('phone/add', 'UserController@addPhone');
    Route::post('avatar/add', 'UserController@uploadAvatar');
    Route::post('update/email', 'UserController@updateEmail');
    Route::post('update/name', 'UserController@updateName');
    Route::post('update/expo', 'UserController@setExpoToken');

    Route::get('company/faq', 'UserController@getFaqs');
    Route::get('company/{type}', 'UserController@getCompanyInfo');
    /**
     * Trip Request Group
     */
    Route::group(['prefix' => 'trip'], function () {
        Route::post('request', 'UserTripController@createTrip');
        Route::get('/', 'UserTripController@getUserTrips');
        Route::get('/pending', 'UserTripController@getPendingTrip');
        Route::get('{id}/cancel', 'UserTripController@cancelTrip');
        Route::post('{id}/review', 'UserTripController@reviewTrip');
        Route::get('{id}/track', 'UserTripController@trackTrip');

    });

    Route::group(['prefix' => 'location'], function () {
        Route::get('/', 'UserController@getLocations');
        Route::post('/add', 'UserController@addLocation');
        Route::post('{id}', 'UserController@editLocation');
    });

    Route::group(['prefix' => 'payment'], function () {
        Route::get('initialize', 'PaymentController@initiateCardTransaction');
        Route::post('verify', 'PaymentController@verifyCardTransaction');
        Route::get('cards', 'UserController@getCards');
    });

    Route::group(['prefix' => 'chat'], function () {
        Route::get('/', 'ChatController@getMessages');
        Route::post('/', 'ChatController@sendMessage');
    });
});




/**
 * Driver Routes
 */

Route::group(['prefix' => 'driver'], function () {
    Route::post('login', 'DriverController@authenticate');

    Route::group(['middleware' => ['jwt.verify', 'driver']], function () {
        Route::group(['prefix' => 'trip'], function () {
            Route::get('{id}/accept', 'DriverController@acceptTrip');
            Route::get('{id}/cancel', 'UserTripController@cancelTrip');
            Route::post('{id}/complete', 'DriverController@completeTrip');
            Route::post('{id}/review', 'UserTripController@reviewTrip');
        });
    });
});

/**
 * external admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::post('register', 'AdminController@register');
    Route::post('login', 'AdminController@authenticate');
});

Route::group(['middleware' => ['cors', 'jwt.verify', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('customer', 'ReportController@getUsers');
    Route::get('driver', 'ReportController@getDrivers');
    Route::get('driver/active', 'DriverController@getAvailable');
    Route::post('driver/create', 'AdminController@createDriver');

    Route::group(['prefix' => 'user'], function () {
        Route::get('{id}', 'AdminController@getUser');
        Route::post('{id}/block', 'AdminController@toggleUserStatus');
        Route::get('{id}/locations', 'AdminController@getUserLocation');
    });


    Route::group(['prefix' => 'notification'], function () {
        Route::get('/', 'AdminController@getNotification');
    });



    Route::group(['prefix' => 'report'], function () {
        Route::get('summary', 'ReportController@reportSummary');
    });


    Route::group(['prefix' => 'count'], function () {
        Route::get('customer', 'ReportController@getUsersCount');
        Route::get('driver', 'ReportController@getDriversCount');
    });

    Route::group(['prefix' => 'chat'], function(){
        Route::get('/', 'ChatController@getAllChat');
        Route::get('{id}', 'ChatController@getSingleChatMessages');
        Route::post('/', 'ChatController@sendReply');
    });

    Route::group(['prefix' => 'trip'], function () {
        Route::get('/', 'AdminController@getTrips');
        Route::get('/pending', 'AdminController@getTripRequests');
        Route::get('/progress', 'AdminController@getInProgressTrips');
        Route::get('/completed', 'AdminController@getInProgressTrips');
        Route::get('{id}', 'AdminController@getSingleTrip');
        Route::post('{id}/{driver}', 'AdminController@assignDriver');
        Route::delete('{id}', 'AdminController@deleteTrip');
    });
});
