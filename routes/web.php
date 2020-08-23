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


Route::get('/password/reset', function(){
    return redirect('https://dashboard.laybuy.app/password/reset');
});
Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/user/register', 'UserController@webRegister')->middleware('guest');
Route::group(['prefix' => 'admin'], function () {

});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/materials', 'HomeController@materials')->name('materials');
    Route::get('/suppliers', 'HomeController@suppliers')->name('suppliers');
    Route::get('/no-plan', 'HomeController@noPlan')->name('no-plan');
    Route::get('/cards', 'HomeController@cards')->name('cards');
    Route::get('/customers', 'HomeController@customers')->name('customers');
    Route::get('/history', 'HomeController@history')->name('history');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/customer/{id}', 'HomeController@viewCustomer');

    Route::get('/transactions', 'HomeController@transactions')->name('transactions');
    Route::get('/reports', 'HomeController@reports')->name('reports');
    Route::get('/admins', 'HomeController@admins')->name('admins');
    Route::get('/users', 'HomeController@users')->name('users');
    Route::get('/taskers', 'HomeController@taskers')->name('taskers');
    Route::get('/plans', 'HomeController@tasks')->name('plans');
    Route::get('/settings', 'HomeController@settings')->name('settings');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
    Route::group(['prefix' => 'user'], function () {
        Route::get('/{id}', 'UserController@singleUser');
        Route::get('delete/{id}', 'UserController@deleteUser');
    });
});

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('test', function () {
});

Route::get('artisan/{string}', function ($command) {
    Artisan::call($command);
    return 'Artisan ' . $command . ' Completed';
});
Route::get('shell/{string}', function ($command) {
    exec($command);
    return 'Shell ' . $command . ' Completed';
});

Route::get('avatar/{url}', 'UserController@getProfileImage');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
