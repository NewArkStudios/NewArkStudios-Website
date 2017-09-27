/**
* Notification js file handle user updates and notifications
*/
define('notification', ['jquery'], function($){

    // application
    var app = {
    
        /**
        * Returns html string for individual dropdown
        * of a notification
        */
        'notificationDropdown' : function() {
            return [
                '<li>',
                    '<div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div>',
                    '<div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><a href="">Ahmet</a> yorumladı. <a href="">Çicek bahçeleri...</a> <a href="" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>',
                    '<p>Lorem ipsum sit dolor amet consilium.</p>',
                    '<p class="time">1 Saat önce</p>',
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
            

        },

        /**
        * Javascript for adding Notification to drop-down
        */
        'addNotification' : function(notification) {

            // alias
            var self = this;

           $("#notification-dropdown div.drop-content").append(self.notificationDropdown());

        }
    
    };
    
    return app;

});
