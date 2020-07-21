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
    return 'HELLO WORLD';
   // return view('download-app');
});

Route::get('artisan/{string}', function ($command) {

//    if(str_contains($command,' ')){
//        $command = str_replace($command, ' ', ':');
//    }
    Artisan::call($command);
    return 'Artisan '. $command.' Completed';
   // return view('download-app');
});

Route::get('avatar/{url}', 'UserController@getProfileImage');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
