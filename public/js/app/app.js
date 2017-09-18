/**
* Module used to run on every page of the website
*js/app/app.js
*/
define(['jquery', 'notification'],function($, Notification){

    var app = {
    
        /**
        * Function to run when the page starts
        */
        'start' : function() {

            // Call to get Notifications
            Notification.getAllNotification();
        }
    }

    return app;
});
