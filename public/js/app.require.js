requirejs.config({
    baseUrl: '/js/app',
    shim : {
        /**"jquery_ui" : { "deps" :['jquery'] },
        "bootstrap" : { "deps" :['jquery'] },**/
        /**"jquery"    : { "exports": '$'}*/
    },
    paths: {
        // the left side is the module ID,
        // the right side is the path to
        // the jQuery file, relative to baseUrl.
        // Also, the path should NOT include
        // the '.js' file extension. This example
        // is using jQuery 1.9.0 located at
        // js/lib/jquery-1.9.0.js, relative to
        // the HTML page.
        jquery: '/js/jquery-1.12.4.min',
        jquery_ui: '/js/jquery-ui.min',
        /**bootstrap : '/js/bootstrap.min'**/
    },
    packages: [{
        name: 'moment',
        // This location is relative to baseUrl. Choose bower_components
        // or node_modules, depending on how moment was installed.
        location: '../',
        main: 'moment-with-local.min'
    }]
});

require(['jquery','app'], function($,app){
    app.start();
});
