define('app.display_all_games', ['jquery'], function($){
    var app = {

        'start' : function(){
            console.log("test");
        }
    }

    return app;
});

// call on loading of page
require(['app.display_all_games'], function(app){
    app.start();
})
