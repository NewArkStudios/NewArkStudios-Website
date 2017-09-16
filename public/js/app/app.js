define(['jquery'],function($){

    var app = {
    
        'start' : function() {

            $.get( "/get_all_notifications", function( data ) {
                console.log(data);
            });
        
        }

    }

    return app;

});
