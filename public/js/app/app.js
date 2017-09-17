/**
* Module used to run on every page of the website
* 
*js/app/app.js
*/
define(['jquery'],function($){

    var app = {
    
        /**
        * Function to run when the page starts
        */
        'start' : function() {

            $.get( "/get_all_notifications", function( data ) {
                console.log(data);
            });
        }
    }

    return app;
});
