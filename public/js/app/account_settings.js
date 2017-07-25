
// redirect to correct tab 
// check if the hash exists
if (window.location.hash) {

    var hash = window.location.hash;

    // check if id exists
    var section = $('a[href="' + hash +'"]');

    if (section != null && section.length != 0) {

        // trigger click
        section.trigger('click');
    }
}