<?php

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

Route::get('/pages', function () {
    return "Return List of Pages";
});


Route::group(['middleware' => ['web']], function ($router) {
    // Terms Routes...
    //$router->get('terms', 'TermsController@show');
    // Settings Dashboard Routes...

});