/**
* Javascript meant to update the posts
* with appropriate UI elements
*/
define('app.thread', ['jquery', 'lib.editor'], function($, Editor){

    var app = {

        'start' : function() {
            
            // alias
            var self = this;

            Editor.initEditor("#body");
            self.initEventListeners();
        },

        /**
        * Init event-listeners for this dialog
        */
        'initEventListeners' : function(){
            
            // alias
            var self = this;

            // preview container event-listener
            $("#preview-button").on('click', function(){
            
                var editorContent = Editor.tinyMCE.activeEditor.getContent({'format' : 'raw'})
                $("#preview-container").html(editorContent);
            })

            // when form submits update the content of textarea for form
            $("#post-button").on("click", function(){
            
                var editorContent = Editor.tinyMCE.activeEditor.getContent({'format' : 'raw'})
                $("#body").html(editorContent);
            });
        }
    }

    return app;

});

// start app on page load
require(['app.thread'], function(app){
    app.start();
});
