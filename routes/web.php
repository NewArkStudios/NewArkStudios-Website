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
    Route::post('make_post', 'PostController@make_post')
    ->name('make_post')->middleware('logged_in');

    // Route for replying to forum post
    Route::post('make_reply', 'ReplyController@make_reply')
        ->name('make_reply')->middleware('logged_in');

    // close a post so no one can contribute to it anymore
    Route::post('close_post', 'PostController@close_post')->name('close_post');

    // close a post so no one can contribute to it anymore
    Route::post('open_post', 'PostController@open_post')->name('open_post');

    // close a post so no one can contribute to it anymore
    Route::post('delete_post', 'PostController@delete_post')->name('delete_post');

    // Display UI for reporting user based on post or reply
    Route::post('display_report_user', 'ReportController@display_report_user')
    ->middleware('logged_in');

    // Post request to actually send report
    Route::post('report_user', 'ReportController@report_user')
    ->middleware('logged_in')->name('report_user');
});

/**
* Grouped routing for sending direct messages
*/
Route::group(['prefix' => 'messages'], function(){
    
    // Route for getting the UI to send a direct message
    Route::get('display_make_message/{receiver_id}',
        'MessageController@display_make_message')->middleware('logged_in');

    // Route for sending a direct message
    Route::post('make_message', 'MessageController@make_message')
        ->name('make_message')->middleware('logged_in');

    // Get inbox, list all messages
    Route::get('inbox', 'MessageController@inbox')
        ->name('inbox')->middleware('logged_in');
        
    // Get individual Direct message to display
    Route::get('message/{message_id}', 'MessageController@display_message')
    ->middleware('logged_in');

    // Route for sending a direct message
    Route::post('reply_message', 'MessageController@reply_message')
        ->name('reply_message')->middleware('logged_in');
});

/**
* Routing for threading categories, display all posts under the category
* TODO possibly do pinned posts
*/
Route::get('thread_category/{slug}', 'ForumController@get_post_list');

// Route for making post UI Wise
Route::get('create_post/{slug}', 'ForumController@display_create_post');

// Route for individual post
Route::get('post/{slug}', 'PostController@display_post');

// Route thanks for posting
Route::get('/thanks_post', function() {
    return view('pages.thread_thanks_post');
});


/**
* Grouped routing for threads for account handling
*/
Route::group(['prefix' => 'account'], function(){

    // Route for viewing profile information
    Route::get('profile', 'AccountController@display_edit_profile')->name('update_profile');

    Route::post('update_profile_post', 'AccountController@update_profile_post')->name('update_profile_post');

    Route::get('settings', 'AccountController@get_Settings')->name('account_settings');

    Route::post('update_account_post', 'AccountController@update_account_post')->name('update_account_post');

});

Route::get('profile/{profile_slug}', 'AccountController@display_profile');

// Panel for special admin management
Route::get('admin_panel', 'AdminController@display_admin_panel')->name('display_admin_panel');