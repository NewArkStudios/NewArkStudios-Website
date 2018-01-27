define('lib.ajax', ['jquery'], function($) { 
    var app = {
        
        /**
        * Function to initialize ajax call
        */
        'initAJAX' : function(){

            // alias
            var self = this;

            // check which values to grab 
            var token = $('#csrf_token').html();

            if (token === undefined)
                token = $('input[name="_token"]').val()

            // all laravel queries require x-csrf protoection
            $.ajaxSetup({
                headers:
                {
                    'X-CSRF-Token': token
                }
            }); 
        }
    }

    app.initAJAX();

    return app;
});

