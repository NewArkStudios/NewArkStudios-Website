define('lib.ajax', ['jquery'], function($) { 
    var app = {
        
        /**
        * Function to initialize ajax call
        */
        'initAJAX' : function(){

            // alias
            var self = this;

            // all laravel queries require x-csrf protoection
            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            }); 
        }
    }

    app.initAJAX();

    return app;
});

