<?php

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


Route::get('/', function () {
    return 'API WORKS';
});
Route::group(['namespace' => 'Auth', 'middleware' => 'api', 'prefix' => 'password'], function () {
    Route::post('forgot', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');


Route::get('user/verify/{verification_code}', 'AuthController@verifyUser')->name('user.verify');

Route::get('payment/verify', 'PaymentController@verifyCardTransaction');


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::post('phone/add', 'UserController@addPhone');
    Route::get('user/transactions', 'UserController@userTransactions');
    Route::post('user/withdraw', 'UserController@makeWithdrawal');
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

    });

    Route::group(['prefix' => 'payment'], function () {
        Route::get('initialize', 'PaymentController@initiateCardTransaction');
        Route::get('verify', 'PaymentController@verifyCardTransaction');
        Route::post('verify', 'PaymentController@verifyCardTransaction');
        Route::get('cards', 'UserController@getCards');
    });

    Route::group(['prefix' => 'chat'], function () {
        Route::get('/', 'ChatController@getMessages');
        Route::post('/', 'ChatController@sendMessage');
    });
});

