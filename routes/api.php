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


Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('user/verify/{verification_code}', 'AuthController@verifyUser')->name('user.verify');

Route::post('payment/verify', 'UserPlanController@verifyPayment');


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::post('phone/add', 'UserController@addPhone');
    Route::get('user/transactions', 'UserController@userTransactions');
    Route::get('user/cards', 'UserController@userCard');
    Route::get('user/active-card', 'UserController@userActiveCard');

    Route::post('user', 'UserController@update');
    Route::post('avatar/add', 'UserController@uploadAvatar');
    Route::post('update/email', 'UserController@updateEmail');
    Route::post('update/name', 'UserController@updateName');
    Route::post('update/expo', 'UserController@setExpoToken');
    Route::post('update/password', 'UserController@updatePassword');

    Route::get('company/faq', 'UserController@getFaqs');
    Route::get('company/{type}', 'UserController@getCompanyInfo');
    /**
     * Plan Request Group
     */
    Route::group(['prefix' => 'plan'], function () {
        Route::post('request', 'UserPlanController@createPlan');
        Route::get('/', 'UserPlanController@getUserPlans');
        Route::get('/latest', 'UserPlanController@getLastPlans');
        Route::get('/{id}', 'UserPlanController@show');
        Route::post('/', 'UserPlanController@createPlan');
        Route::put('/', 'UserPlanController@update');
        Route::post('/update', 'UserPlanController@update');
        Route::delete('/', 'UserPlanController@delete');
        Route::delete('/{id}', 'UserPlanController@delete');

        Route::get('/pending', 'UserPlanController@getPendingPlan');
        Route::get('{id}/cancel', 'UserPlanController@cancelPlan');
        Route::post('{id}/review', 'UserPlanController@reviewPlan');
        Route::get('{id}/track', 'UserPlanController@trackPlan');
    });

    Route::group(['prefix' => 'location'], function () {
        Route::get('/', 'UserController@getLocations');
        Route::post('/add', 'UserController@addLocation');
        Route::post('{id}', 'UserController@editLocation');
    });

    Route::group(['prefix' => 'payment'], function () {
        Route::get('initialize', 'PaymentController@initiateCardTransaction');
        Route::get('verify', 'PaymentController@verifyCardTransaction');
        Route::get('cards', 'UserController@getCards');
    });

    Route::group(['prefix' => 'chat'], function () {
        Route::get('/', 'ChatController@getMessages');
        Route::post('/', 'ChatController@sendMessage');
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

    Route::group(['prefix' => 'plan'], function () {
        Route::get('/', 'AdminController@getPlans');
        Route::get('/pending', 'AdminController@getPlanRequests');
        Route::get('/progress', 'AdminController@getInProgressPlans');
        Route::get('/completed', 'AdminController@getInProgressPlans');
        Route::get('{id}', 'AdminController@getSinglePlan');
        Route::post('{id}', 'AdminController@assignDriver');
        Route::delete('{id}', 'AdminController@deletePlan');
    });

    Route::group(['prefix' => 'setting'], function(){
        Route::get('/location', 'AdminController@getBaseLocation');
        Route::post('/location', 'AdminController@setBaseLocation');
    });
});
