
define('carousel', ['jquery'], function($){

   var application = {

        'start' : function(){

            this.slideIndex = 1;
            
            // init-event listener
            this.initEventListener();
        
            this.showSlides(1);
        },

        'initEventListener': function() {
        
            // alias
            var self = this;

            $(".slideshow-container a.prev").on('click', function(){
                self.moveSlides(-1);
            });

            $(".slideshow-container a.next").on('click', function(){
                self.moveSlides(1);
            });
            
            $('.slideshow-container span.dot').on('click', function(){
                var index = $(this).index() + 1;
                self.currentSlide(index);
            });

        },

        'moveSlides' : function(n){
            this.slideIndex += n
            this.showSlides();
        },

        'currentSlide': function(n) {
            this.slideIndex = n
            this.showSlides();
        },

        'showSlides': function() {
            
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
