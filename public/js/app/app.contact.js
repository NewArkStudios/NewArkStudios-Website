/**
* Javascript meant to update the posts
* with appropriate UI elements
*/
define('app.contact', ['jquery', 'lib.editor'], function($, Editor){

    var app = {

        'start' : function() {
            
            // alias
            var self = this;

            Editor.initEditor("#message");
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
            $("#send-button").on("click", function(){
            
                var editorContent = Editor.tinyMCE.activeEditor.getContent({'format' : 'raw'})
                $("#message").html(editorContent);
            });
        }
    }

    return app;

});

// start app on page load
require(['app.contact'], function(app){
    app.start();
});
