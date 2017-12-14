// Note that we must run this app.require.js on every page
// it holds all the configs and must be loaded before app.* files
// This way if we do need to run js on every page this module will help us with that
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
        'bootstrap' : '/js/bootstrap.min',
        'jquery_ui': '/js/jquery-ui.min',
        'tinyMCE': '../tinymce/tinymce.min',
        'moment': '../moment-with-local.min',
        'moment-timezone' : '../moment-timezone',
        'moment-timezone-with-data.min' : '../moment-timezone-with-data.min',
        'anime': '../anime.min'
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
       // 'dataTables' : {
       //     'deps':['jquery']
       // },
       // 'jquery_ui' : {
       //     'deps':['jquery']
       // },
        'bootstrap' : {
            'deps' : ['jquery'],
        },
    },
});

// Note this gurantees bootstrap loads after jquery
// shim sometimes not dependable
require(['jquery','jquery_ui'], function($,UI){
    
    // load jquery in window, because bootstrap requires global or else it errors out
    window.jQuery = $;

    require(['bootstrap','app'], function(B, app){
        app.start();
    })
});
