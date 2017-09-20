/**
* Notification js file handle user updates and notifications
*/
define('notification', ['jquery'], function($){

    // application
    var app = {
    
        /**
        * Function to make ajax request to get notifications
        */
        'getAllNotification' : function(){

            // check if user is logged in, by checking whether notification exists
            var loggedin = $('#nav-notifications');

            if (loggedin.length !== 0) {
                $.get( "/get_all_notifications", function( data ) {
                    console.log(data);
                });
            }
        },

        'displayNotification' : function(){
        }
    
    };
    
    return app;

});
