define('app.display_all_games', ['jquery', 'anime'], function($, Anime){
    var app = {

    	'triggerAnimations' : {
    		'main-description' : false,
    		'mechanics' : false,
    		'gallery' : false,
    		'bottom' : false
    	},

        'start' : function(){
            
        	// alias
        	var self = this;

        	// run animations on start
        	self.animations();

        	// run event-listeners
        	self.addEventListeners();


        	// Trigger animations through scroll
			$(window).on('scroll', self.onScroll.bind(self)); 
        },

        /**
		* Function to call when scrolling
        */
        'onScroll' : function(){

        	// alias
        	var self = this;

			if ($(window).scrollTop() + 500 > $("#main-description").position().top && !self.triggerAnimations['main-description']) {

			 	// animate main description, 
			 	Anime({
				  targets: '#main-description div.left-cont',
				  translateX: [-500, 0],
				  duration: 6000,
				  elasticity: 400,
				});

				Anime({
				  targets: '#main-description div.right-cont',
				  translateX: [1000, 0],
				  duration: 6000,
				  elasticity: 200,
				});

				self.triggerAnimations['main-description'] = true;
			} 

			 // mechanics section
			 if ($(window).scrollTop() + 500 > $("#mechanics-title").position().top && !self.triggerAnimations['mechanics']){

			 	// animation timeline
			 	var onebyoneTimeline = Anime.timeline();
				$('#mechanics-section div.feature-smallsection').each(function(index){
	    		 	onebyoneTimeline.add({
					  targets: '#mechanics-section div.feature-smallsection:nth-of-type(' + (index + 1) + ')',
					  translateY: {
					      value : [1000, 0],
					      duration: 2000,
					  	  elasticity: 500,
					  },
					  opacity : {
					  	  value : [0, 1],
					  	  duration: 6000,
					  },
					  offset: 1000 * index
					})
	    		 });

			 	self.triggerAnimations['mechanics'] = true;
			}

			if ($(window).scrollTop() + 500 > $("#gallery-section").position().top && !self.triggerAnimations['gallery']){

			 	// animation timeline
			 	var onebyoneTimelineRotate = Anime.timeline();

			 	// loop through all gallery elements
			 	$('#gallery-section div.gallery_element').each(function(index){
					onebyoneTimelineRotate.add({
					  targets: '#gallery-section div.gallery_element:nth-of-type(' + (index + 1) + ')',
					  rotate: {
					      value : [360, 0],
					      duration: 2000,
					  	  elasticity: 500,
					  },
					  opacity : {
					  	  value : [0, 1],
					  	  duration: 6000,
					  },
					  scale : {
					  	  value : [0, 1],
					  	  duration: 6000,
					  },
					  offset: 300 * index 
					})
			 	})

			 	self.triggerAnimations['gallery'] = true;
			}

			if ($(window).scrollTop() + 500 > $("#bottom-banner").position().top && !self.triggerAnimations['bottom']){

			 	Anime({
				  targets: '#bottom-banner h1, #bottom-banner h4, #bottom-banner button',
				  opacity: [0,1],
				  delay: 1000,
				  duration: 9000
				});

			 	self.triggerAnimations['bottom'] = true;
			}
        },

        /**
		* animations to run on the start
        */
        'animations' : function() {
        	
        	// alias
        	var self = this;

        	// start animation on load for top of page
        	$(document).ready(function(){
        		Anime({
				  targets: '#top-banner h1, #top-banner h4',
				  opacity: 1,
				  scale: 1.5,
				  delay: 1000,
				  duration: 9000
				});

				Anime({
				  targets: '#top-banner img',
				  opacity: [0,1],
				  delay: 1000,
				  duration: 9000
				});
        	});
        },

        /**
		* Add event-listeners to page
        */
        'addEventListeners' : function() {

        	// alias
        	var self = this;

        	// click 
        	$("div.gallery_element span.gallery_hover").on('click', function(){

        		// grab file src and load image
        		var fulldata = $(this).find("img.gallery_img").attr("data-full");

        		// if modal does not exist
        		if($('#myModal').length == 0){
        			var html = [
	        			'<div class="modal fade" id="myModal" role="dialog">',
					   	'<div class="modal-dialog">',
					    
					      '<div class="modal-content">',
					        '<div class="modal-header">',
					          '<button type="button" class="close" data-dismiss="modal">&times;</button>',
					          '<h4 class="modal-title">Modal Header</h4>',
					        '</div>',
					        '<div class="modal-body">',
					          '<p>Some text in the modal.</p>',
					        '</div>',
					        '<div class="modal-footer">',
					          '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>',
					        '</div>',
					      '</div>',
					      
					      '</div>',
					    '</div>',
        			].join("");

	        		// load html onto page
	        		$('body').append(html);
        		}


	        	$('#myModal').modal();
        	});
        }
    }

    return app;
});

// call on loading of page
require(['app.display_all_games'], function(app){
    app.start();
})
