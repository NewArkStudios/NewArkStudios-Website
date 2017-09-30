/**
* Notification js file handle user updates and notifications
*/
define('notification', ['jquery', 'moment'], function($, Moment){

    // application
    var app = {
    
        /**
        * Returns html string for individual dropdown
        * of a notification
        * @param params : JSON object containing the items we can add to 
        * notification
        */
        'notificationDropdown' : function(params) {
            return [
                '<li class="notification-entry" data-url="' + params.url + '">',
                    '<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>',
                    '<div class="col-md-9 col-sm-9 col-xs-9 pd-l0">' + params.notification + params.unique,
                    '<p class="time">' + params.time + '</p>',
                    '</div>',
                '</li>',
            ].join(" ");
        },

        /**
        * Function to make ajax request to get notifications
        */
        'getAllNotification' : function(){

            // alias
            var self = this;

            // check if user is logged in, by checking whether notification exists
            var loggedin = $('#notification-dropdown');

            if (loggedin.length !== 0) {
                $.get( "/get_all_notifications", function( data ) {
                    self.displayNotification(data);
                });
            }
        },

        /**
        * Create the notification information
        * @param data JSON Object containing notification data
        * {
        *     "id": "c1100bf4-cd05-47eb-a9a5-e3c722002e6a",
        *     "type": "App\\Notifications\\Messages",
        *     "notifiable_id": 1,
        *     "notifiable_type": "App\\User",
        *     "data": {
        *       "notification": "New Direct Message",
        *       "message": "http://localhost/notif"
        *     },
        *     "read_at": null,
        *     "created_at": "2017-09-18 22:49:32",
        *     "updated_at": "2017-09-18 22:49:32"
        *    }
        */
        'displayNotification' : function(data){
            
            // alias
            var self = this;

            // loop through notfications
            for (var ind = 0; ind < data.length; ind++) {
            
                var notification = data[ind];
                self.addNotification(notification);
            }
            
            // once we are done looping add event-listeners
            self.addEventListener();

        },

        /**
        * Javascript for adding Notification to drop-down
        * @param data - notification object that we got from ajax call
        */
        'addNotification' : function(data) {

            // alias
            var self = this;

            // note all of these values must be present in notification
            // object
            var params = {
                'notification' : data.data.notification,
                'url' : data.data.url,
                'time' : Moment(data.created_at, "YYYYMMDD").fromNow(),
            }

            // identify the type of notification we get
            // add object unique to notification type
            switch(data.type) {
                case "App\\Notifications\\Messages":
                    
                    // add html unique to this type
                    params.unique = [
                        '<p>From: ',
                        data.data.sendername + '</p>',
                        '<p> Subject: ',
                        data.data.subject + '</p>',
                    ].join("");
                    break;
            }
            

            var notification = self.notificationDropdown(params);
            $("#notification-dropdown div.drop-content").append(notification);
        },

        /**
        * Add event-listeners to the notification we added
        *
        */
        'addEventListener' : function() {
            
            // alias
            var self = this;

            // notification click event
            $('#notification-dropdown div.drop-content').on('click', 'li.notification-entry', function(){
            
               // redirect 
               window.location.href = $(this).attr('data-url');

            })
        
        },
    
    };
    
    return app;

});
