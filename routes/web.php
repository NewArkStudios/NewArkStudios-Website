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

/* Home route
   PagesController(at)home is the controller then function
   name is a named route */
Route::get('/', 'PagesController@home')->name('home');

// generate all necessary authentication routes
// http://stackoverflow.com/questions/39196968/laravel-5-3-new-authroutes
Auth::routes();

/**
* Grouped routing for threads
*/
Route::group(['prefix' => 'thread'], function(){

    // Route for making post UI Wise
    Route::get('post', 'ForumController@get_post')->name('get_post');

    // Route for submitting forum thread
    Route::post('make_post', 'ForumController@make_post')->name('make_post');

});

