requirejs.config({
    baseUrl: '/js/app',
    paths: {
        // the left side is the module ID,
        // the right side is the path to
        // the jQuery file, relative to baseUrl.
        // Also, the path should NOT include
        // the '.js' file extension. This example
        // is using jQuery 1.9.0 located at
        // js/lib/jquery-1.9.0.js, relative to
        // the HTML page.
        'jquery': '/js/jquery-1.12.4.min',
        'datatables': '../DataTables/js/jquery.dataTables.min',
        'datatables.net': '../DataTables/js/jquery.dataTables',
        'jquery_ui': '/js/jquery-ui.min',
        'tinyMCE': '../tinymce/tinymce.min',
        'moment': '../moment-with-local.min'
        /**bootstrap : '/js/bootstrap.min'**/
    },
    shim: {
        'tinyMCE': {
            exports: 'tinyMCE',
            init: function () {
                this.tinyMCE.DOM.events.domLoaded = true;
                return this.tinyMCE;
            }
        },
        'dataTables' : ['jquery']
    },
});

require(['jquery','app'], function($,app){
    app.start();
});
