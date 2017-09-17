/**
* File : js/app/app.moderator.js
* run on moderator page
**/
define('app.moderator', ['jquery'], function($){

    var app = {

        // Defined for this file should already be 
        // JQUERY and bootstrap
        // located at the bottom of the page
        'start' : function(){
            $("#ban-submit").submit(function(){

                // grab the name of the user
                var suspect = $("#ban-submit").data('suspect');

                if (!(confirm("Are you sure you would ban user: " + suspect))) {

                    // if no then simply return 
                    return false
                }
            });
        }
    }

    return app;

});

// code to run on file load
require(['app.moderator'], function(app){

    // start the application
    app.start();
    
});
