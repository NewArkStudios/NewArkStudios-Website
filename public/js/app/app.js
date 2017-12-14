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

                if(!self.validateTimestamp(timestamp)) {
                    $(this).text("");
                    return true; // note return true in each is continue;
                }

                // convert to universal object then to local time
                var gmtDateTime = Moment.utc(timestamp, "YYYY-MMM-DD h:mm A");
                $(this).text(gmtDateTime.local().format('YYYY-MMM-DD h:mm A'));
            });
        },

        /**
        * Make sure that timestamp is valid
        * if not return false
        * @param timestamp : String containing the timestamp we want to validate
        * @returns false if timestamp html is not valid
        */
        'validateTimestamp' : function(timestamp){
        
            // alias
            var self = this;

            var date = Moment(timestamp);
            return date.isValid();
        }
    }

    return app;
});
