<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function() {
    foreach (['order', 'salon', 'auto', 'dealer', 'city',
                 'mark', 'model', 'generation', 'body', 'gearbox'] as $name) {
        Route::group(['middleware' => ['role:admin']], function() use ($name) {
            Route::get("$name/query", 'BaseController@query');
            Route::post("$name/{id}", 'BaseController@update');
            Route::resource($name, 'BaseController', ['only' => ['store', 'update', 'destroy']]);
        });
        Route::resource($name, 'BaseController', ['only' => ['index', 'show']]);
    }
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'ViewController@dashboard');
    Route::get('{name}', 'ViewController@grid');
    Route::get('{name}/new', 'ViewController@edit');
    Route::get('{name}/{id}', 'ViewController@edit');
});


Route::auth();
Route::get('/home', 'HomeController@index');
