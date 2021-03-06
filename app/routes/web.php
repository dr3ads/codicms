<?php

use Illuminate\Support\Facades\Config;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/* front end pages */
Route::get('/pages', function () {
    return "Return List of Pages";
});

Route::get('/page/{slug}', 'FrontEnd\PagesController@show');


/* admin pages */

Route::group(['middleware' => ['web', 'auth']], function ($router) {
    $router->group(['prefix' => Config::get('copya.admin_path'), 'namespace' => 'Admin',], function($router){
        $router->get('/', function(){
            return redirect()->route('dashboard');
        });
        $router->get('/dashboard', 'UsersController@index')->name('dashboard');

        $router->group(['prefix' => 'pages'], function($router){
            $router->get('/', 'PagesController@index')->name('pages');
            $router->get('/add', 'PagesController@create')->name('add.page');
            $router->get('{id}/edit', 'PagesController@edit')->name('edit.page');
        });

        $router->group(['prefix' => 'users'], function($router){
            $router->get('/', 'UsersController@index')->name('users');
            $router->get('/add', 'UsersController@index')->name('add.user');
        });



    });
});