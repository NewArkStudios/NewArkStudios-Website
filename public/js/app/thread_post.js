/*
* Javascript meant to update the posts
* with appropriate UI elements
*/

// initialize content for page
$("#post-edited-dialog").dialog({
    autoOpen: false,
});

// note may not use dialog because there is a chance it will
// not appear well on phone
$('#post-edited').on('click', function(){

    $('#post-edited-dialog').dialog('open');

});