define('account_settings', ['jquery'], function($) {

    var settings = {
        'init' : function() {
            
            // redirect to correct tab 
            // check if the hash exists
            if (window.location.hash) {

                var hash = window.location.hash;

                // check if id exists
                var section = $('a[href="' + hash +'"]');
                console.log(section);

                if (section != null && section.length != 0) {

                    // https://stackoverflow.com/questions/20928915/jquery-triggerclick-not-working
                    section[0].click();
                }
            }
        }
    }

    return settings;
});

// call to run module on load
require(['jquery', 'account_settings'], function($, settings){
    settings.init();
})

