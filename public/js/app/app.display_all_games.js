define('app.display_all_games', ['jquery', 'anime'], function($, Anime){
    var app = {

        'start' : function(){

        	// alias
        	self = this;

        	$(document).ready(function(){
        		self.animations();
        	})


        },

        'animations' : function(){
        	Anime({
			  targets: 'div.game_div.col-md-5',
			  translateX: [-1000, 0],
			  duration: 1000,
			  easing : "easeInOutQuint"
			});

        	Anime({
			  targets: 'div.game_div.col-md-7',
			  translateX: [1000, 0],
			  duration: 1000,
			  easing : "easeInOutQuint"
			});
        }
    }

    return app;
});

// call on loading of page
require(['app.display_all_games'], function(app){
    app.start();
})
