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
    Route::get('view_categories', 'ForumController@view_categories')->name('view_categories');

    // Route for submitting forum thread
    Route::post('make_post', 'ForumController@make_post')->name('make_post');

    // Route for replying to forum post
    Route::post('make_reply', 'ForumController@make_reply')->name('make_reply');

});

/**
* Routing for threading categories, display all posts under the category
* TODO possibly do pinned posts
*/
Route::get('thread_category/{category_id}', 'ForumController@get_post_list');

// Route for making post UI Wise
Route::get('create_post/{category_id}', 'ForumController@get_post');

// Route for individual post
Route::get('post/{post_id}', 'ForumController@display_post');

// Route thanks for posting
Route::get('/thanks_post', function() {
    return view('pages.thread_thanks_post');
});
