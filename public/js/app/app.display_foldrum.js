define('app.display_all_games', ['jquery', 'anime'], function($, Anime){
    var app = {

    	'triggerAnimations' : {
    		'main-description' : false,
    		'mechanics' : false,
    		'gallery' : false,
    		'bottom' : false
    	},

    	'resolutionOffset' : 500,

        'start' : function(){
            
        	// alias
        	var self = this;

        	self.updateOffset();

        	// run animations on start
        	self.animations();

        	// run event-listeners
        	self.addEventListeners();


        	// Trigger animations through scroll
			$(window).on('scroll', self.onScroll.bind(self)); 
        },

		/**
		* Update resolution on offset based on window size for triggers
		* 
		*/
        'updateOffset' : function(){

        	// alias
        	var self = this;

        	// Get resolution
        	var resolutionWidth = $(window).width();

        	if (resolutionWidth > 1500)
        		self.resolutionOffset = 800;

        },

        /**
		* Function to call when scrolling
        */
        'onScroll' : function(){

        	// alias
        	var self = this;

			if ($(window).scrollTop() + self.resolutionOffset > $("#main-description").position().top && !self.triggerAnimations['main-description']) {

			 	// animate main description, 
			 	Anime({
				  targets: '#main-description div.left-cont',
				  translateX: [-500, 0],
				  duration: 500,
				  easing : "linear"
				});

				Anime({
				  targets: '#main-description div.right-cont',
				  translateX: [1000, 0],
				  duration: 500,
				  easing : "linear"
				});

				self.triggerAnimations['main-description'] = true;
			} 

			 // mechanics section
			 if ($(window).scrollTop() + self.resolutionOffset > $("#mechanics-title").position().top && !self.triggerAnimations['mechanics']){

			 	// animation timeline
			 	var onebyoneTimeline = Anime.timeline();
				$('#mechanics-section div.feature-smallsection').each(function(index){
	    		 	onebyoneTimeline.add({
					  targets: '#mechanics-section div.feature-smallsection:nth-of-type(' + (index + 1) + ')',
					  translateY: {
					      value : [1000, 0],
					      duration: 500,
					  	  easing : "linear"
					  },
					  opacity : {
					  	  value : [0, 1],
					  	  duration: 1000,
					  	  easing : "linear"
					  },
					  offset: 1000 * index
					})
	    		 });

			 	self.triggerAnimations['mechanics'] = true;
			}

			if ($(window).scrollTop() + self.resolutionOffset > $("#gallery-section").position().top && !self.triggerAnimations['gallery']){

			 	// animation timeline
			 	var onebyoneTimelineRotate = Anime.timeline();

			 	// loop through all gallery elements
			 	$('#gallery-section div.gallery_element').each(function(index){
					onebyoneTimelineRotate.add({
					  targets: '#gallery-section div.gallery_element:nth-of-type(' + (index + 1) + ')',
					  opacity : {
					  	  value : [0, 1],
					  	  duration: 2000,
					  	  easing : "linear"
					  },
					  offset: 300 * index 
					})
			 	})

			 	self.triggerAnimations['gallery'] = true;
			}

			if ($(window).scrollTop() + self.resolutionOffset > $("#bottom-banner").position().top && !self.triggerAnimations['bottom']){

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
        		var src = $(this).find("img.gallery_img").attr("src");

        		// load image data
        		var image = "<img class='modal_img' src='" + src + "'></img>"

        		// if modal already exists  
        		if ($('#gallery_modal').length != 0){
        			$('#gallery_modal').remove();
        		} 

    			var html = [
        			'<div class="modal fade" id="gallery_modal" role="dialog">',
				   	'<div class="modal-dialog modal-lg">',
				      '<div class="modal-content">',
				        '<div class="modal-header">',
				          '<button type="button" class="close" data-dismiss="modal">&times;</button>',
				          '<h4 class="modal-title">Screenshot</h4>',
				        '</div>',
				        '<div class="modal-body">',
				        	image,
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

	        	$('#gallery_modal').modal();
        	});
        }
    }

    return app;
});

// call on loading of page
require(['app.display_all_games'], function(app){
    app.start();
})
