/**
* Javascript meant to update the posts list with appropriate ui elements
* with appropriate UI elements
*/
define('app.thread_post_list', ['jquery', 'jquery_ui'], function($, UI){

    var app = {

        /**
        * Function to start the javascript
        */
        'start' : function(){

            // alias
            var self = this;
            
            self.collapsetext();
        },

        /**
        * We want to keep all the content 
        * passed over but to make it more easy to digest and encourage
        * users to enter we collapse it.
        */
        'collapsetext' : function(){

            // alias
            var self = this;
            
            // Go through all text and update appropriately
            $("p.post-list-content").each(function(index, element){
                var content = $(this).text();
                var collapsedtext = content.substring(0, 50) + "...";
                $(this).text(collapsedtext);
            });
        }


    }

    return app;

});

require(['app.thread_post_list'], function(app){
    app.start();
});
