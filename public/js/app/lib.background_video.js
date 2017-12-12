
define('lib.background_video', ['jquery'], function($){

    var app = {
        'start' : function() {

            // remove padding on top of video container
            $("div.theme-showcase").css("padding", "0");

            var vid = document.getElementById("bgvid");
            
            // sanity check 
            if (!vid)
                return;

            var pauseButton = document.querySelector("#polina button");

            if (window.matchMedia('(prefers-reduced-motion)').matches) {
                vid.removeAttribute("autoplay");
                vid.pause();
                pauseButton.innerHTML = "Paused";
            }

            function vidFade() {
              vid.classList.add("stopfade");
            }

            vid.addEventListener('ended', function()
            {
            // only functional if "loop" is removed 
            vid.pause();
            // to capture IE10
            vidFade();
            }); 


            pauseButton.addEventListener("click", function() {
              vid.classList.toggle("stopfade");
              if (vid.paused) {
                vid.play();
                pauseButton.innerHTML = "Pause";
              } else {
                vid.pause();
                pauseButton.innerHTML = "Paused";
              }
            })

        }
    }

    return app;
});

// call on loading of page
require(['lib.background_video'], function(app){
    app.start();
})
