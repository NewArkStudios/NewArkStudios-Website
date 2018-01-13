define('app.announcements', ['jquery'], function($) {

    var application = {

        /**
        * Start the application the for the announcements page
        */
        'start' : function() {

            // alias
            var self = this;

            // initialize event-listeners
            self.initEventListeners();
        },

        /**
        * Initialize event-listeners, for the page
        */
        'initEventListeners' : function(){

            // alias
            var self = this;

            // click of thumbnail triggers redirect of link
            $('.announcement-thumbnail').on('click', function(){
                window.location.href = $(this).attr('data-url');
            });
        },

    };

    return application;
});

// call on loading of page
require(['app.announcements'], function(app){
    app.start();
});
