/**
* Module used to run on every page of the website
*js/app/app.js
*/
define(['jquery', 'notification', 'moment-timezone-with-data.min'], function($, Notification, Moment){

    var app = {
    
        /**
        * Function to run when the page starts
        */
        'start' : function() {

            // alias
            var self = this;

            // Call to get Notifications
            Notification.getAllNotification();

            self.updateTimes();
            
        },

        /**
        * Update times to display in local time zones of user
        * Note that it grabs all instances of .timestamp-moment
        */
        'updateTimes' : function(){

            // alias
            var self = this;

            // update all timestamps
            $('.timestamp-moment').each(function(index) {
                var timestamp = $(this).text();

                // convert to universal object then to local time
                var gmtDateTime = Moment.utc(timestamp, "YYYY-MMM-DD h:mm A");
                $(this).text(gmtDateTime.local().format('YYYY-MMM-DD h:mm A'));
            });
        }
    }

    return app;
});
