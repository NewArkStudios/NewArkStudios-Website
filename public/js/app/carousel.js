
define('carousel', ['jquery'], function($){

   var application = {

        'start' : function(){
            this.showSlides(1);
        },

        'plusSlides' : function(n){
            showSlides(slideIndex += n);
        },

        'currentSlide': function(n) {
            showSlides(slideIndex = n);
        },

        'showSlides': function(n) {
          var i;
          var slides = $(".mySlides");
          var dots = $(".dot");
          if (n > slides.length) {
            slideIndex = 1
          } 
          if (n < 1) {
            slideIndex = slides.length
          }

          // loop through all display and hide
          $(slides).each(function(index, element){
            $(element).css('display', 'none');
          });

          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides.get(n-1).style.display = "block"; 
          dots.get(n-1).className += " active";
        }
   } 

    return application;

})

// call on loading of page
require(['carousel'], function(app){
    app.start();
});
