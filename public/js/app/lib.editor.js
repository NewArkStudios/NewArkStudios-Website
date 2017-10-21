define('lib.editor', ['jquery', 'tinyMCE'], function($, tinyMCE){
    var app = {

        // tinyMCE instance that we store here
        'tinyMCE' : tinyMCE,

        /**
        * Initialize text-editor
        * @param selector : String containing the jquery selector
        */
        'initEditor' : function(selector) {

            // base options to include with every editor
            var toolbarOptions = 'undo redo | fontsizeselect | bold italic underline | link image | forecolor | ' +
            'alignleft aligncenter alignright alignjustify | bullist numlist';

            // initialize text-editor
            // note that certain menus only appear when plugin is specified
            tinyMCE.init({
                selector: selector,
                branding: false,
                plugins: 'code, image, textcolor, link',
                menubar: 'edit insert view format table tools help',
                toolbar: toolbarOptions
            });
        }
    }

    return app;
});

