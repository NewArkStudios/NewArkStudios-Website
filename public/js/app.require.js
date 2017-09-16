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
    /**jquery_ui: '/js/jquery-ui.min',
    bootstrap : '/js/bootstrap.min'**/
}
});

require(['jquery','app'], function($,app){
    app.start();
});
