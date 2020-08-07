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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('test', function(){


});

Route::get('artisan/{string}', function ($command) {
    Artisan::call($command);
    return 'Artisan '. $command.' Completed';
});

Route::get('avatar/{url}', 'UserController@getProfileImage');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


//
//Route::get('register', function () {
//    return redirect('admin');
//})->name('register');
//Auth::routes();
//
//Route::get('home', function () {
//    return redirect('admin');
//});
//
//Route::get('add/admins', function () {
//
////     $users = [
////         [
////             'name' => 'Emmanuel Idowu',
////             'email' => 'idowu.immanuel17@gmail.com',
////             'password' => Hash::make('P@$$w07D'),
////         ],
////         [
////             'name' => 'Olalekan Akintola',
////             'email' => 'akinlekan@gmail.com',
////             'password' => Hash::make('P@$$w07D'),
////         ]
////     ];
////
////     foreach ($users as $user) {
////         User::create($user);
////     }
////     return User::get();
//});
//Route::group(['middleware' => 'auth'], function () {
//    Route::delete('products/{id}', 'ProductController@destroy');
//    Route::delete('admins/{id}', 'AdminController@destroy')->name('user.destroy');
//    Route::delete('vendors/{id}', 'VendorController@destroy');
//    Route::get('vendors/{id}', 'VendorController@edit');
//
//    Route::any('logout', 'HomeController@logout');
//
//    Route::get('/', 'AdminController@index')->name('home');
//    Route::get('products/{id}', 'ProductController@edit');
//    Route::post('products/{id}', 'ProductController@update');
//
//    Route::get('products', 'AdminController@products');
//    Route::get('vendors', 'AdminController@vendors');
//    Route::get('admins', 'AdminController@admins');
//    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
//    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
//    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
//});
