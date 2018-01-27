define('app.announcement', ['jquery', 'lib.ajax'], function($, AJAX) {

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

        'initEventListeners' : function() {
            
            // alias
            var self = this;

            var recentArticles = $('.recent-article-element');
            var count = recentArticles.length;

            // on click of load more button add more announcements
            $("#loadmoreButton").on('click', function(){
            
                var postData = {
                    'start': count - 2,
                    'amount': 5
                };

                var url = "/announcement/get_more";
                $.post(url, postData, function(data){
                    console.log(data);          
                })
            
            });
        }

    };

    return application;
});

// call on loading of page
require(['app.announcement'], function(app){
    app.start();
});
