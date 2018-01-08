define('carousel', ['jquery'], function($){

   var application = {

        /**
        * Start of the carousel application
        */
        'start' : function(){

            // alias
            var self = this;

            this.slideIndex = 1;
            
            // init-event listener
            this.initEventListener();

            // init initial size
            this.resizeElementsOnCarousel();
        
            this.showSlides("left");

            // set interval four how long we toggle the auto change
            self.autoInterval = setInterval(self.moveSlides.bind(self), 5000, 1);
        },

        /**
        * Function to initialize all the event listeners
        */
        'initEventListener': function() {
        
            // alias
            var self = this;

            // previous button
            $(".slideshow-container a.prev").on('click', function(){
                self.moveSlides(-1);
                self.resetInterval();
            });

            // next button
            $(".slideshow-container a.next").on('click', function(){
                self.moveSlides(1);
                self.resetInterval();
            });
            
            // buttons at the bottom
            $('.slideshow-container span.dot').on('click', function(){
                var index = $(this).index() + 1;
                self.currentSlide(index);
                self.resetInterval();
            });

            // on resize of window update carousel appropriately
            $(window).on('resize', function(){
                self.resizeElementsOnCarousel(); 
            });

        },


        /*
        * Reset the auto change interval to start again
        */
        'resetInterval' : function() {

            // alias
            var self = this; 

            clearInterval(self.autoInterval);
            self.autoInterval = setInterval(self.moveSlides.bind(self), 5000, 1)

        },

        /**
        Resize elements such as the caption and buttons that are on the carousel
        */
        'resizeElementsOnCarousel' : function(){
        
            // alias
            var self = this;

            // get the window height
            var wWidth = $(window).width();
            var sHeight = 450; // slideshow height default
            var cTop = "20%";

            // handle based on view-port
            if (wWidth > 1350) {
                sHeight = 500;
                cTop = "40%";
            } else if (wWidth > 800) {
                sHeight = 450;
                cTop = "40%";
            } else if (wWidth > 700)
                sHeight = 400;
            else if (wWidth > 600)
                sHeight = 300;
            else if (wWidth > 500)
                sHeight = 250;
            else if (wWidth > 400)
                sHeight = 200;
            else if (wWidth > 350)
                sHeight = 180;
            else
                sHeight = 160;
                
            // set the new height for the sliding container
            $('.slideshow-container').height(sHeight);
            $('.slideshow-caption').css('top', cTop);
        },

        /**
        * Move slides forward and backwards
        * @param n : Integer indicating how many slides to move
        * negative backwards and positive for forwards
        */
        'moveSlides' : function(n){

            // alias
            var self = this;

            this.slideIndex += n

            // indicate direction of showing slides
            if (n < 0)
                var direction = "left";
            else
                var direction = "right";

            this.showSlides(direction);
        },

        /**
        * Get to the current slide indicated by the number n
        * @param n - integer indicating the slide we want to go to
        * note the slides start from 1
        */
        'currentSlide': function(n) {
            this.slideIndex = n
            this.showSlides("left");
        },

        /**
        * Function used to show the slides
        * @param direction - String indicating the direction we are moving the slides
        */
        'showSlides': function(direction) {
            
            // alias
            var self = this;

            var i;
            var slides = $(".mySlides");
            var dots = $(".dot");
                if (self.slideIndex > slides.length) {
              self.slideIndex = 1
            } 

            if (self.slideIndex < 1) {
              self.slideIndex = slides.length
            }

            // loop through all display and hide
            $(slides).each(function(index, element){
              $(element).css('display', 'none');
            });

            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            // change direction
            if(direction == "left") {
                $(slides).addClass('fade-carousel-left');
                $(slides).removeClass('fade-carousel-right');
            } else {
                $(slides).removeClass('fade-carousel-left');
                $(slides).addClass('fade-carousel-right');
            }


            // display the slides
            slides.get(self.slideIndex-1).style.display = "block"; 
            dots.get(self.slideIndex-1).className += " active";

        }
   } 

    return application;

})

// call on loading of page
require(['carousel'], function(app){
    app.start();
});
