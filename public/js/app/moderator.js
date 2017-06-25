// Defined for this file should already be 
// JQUERY and bootstrap
// located at the bottom of the page
$("#ban-submit").submit(function(){

    // grab the name of the user
    var suspect = $("#ban-submit").data('suspect');

    confirm("Are you sure you would ban user: " + suspect);
    return false
});

