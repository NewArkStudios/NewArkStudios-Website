/**
* Javascript meant to update the posts
* with appropriate UI elements
*/
define('app.thread_post', ['jquery', 'jquery_ui'], function($, UI){

    var app = {

        'start' : function() {

            // on click event for preview section
            $('#preview-button').on('click', function(){

                // update preview section
                $("#preview-content").html($("#body").val());

            });

            // initialize content for page
            $("#post-edited-dialog").dialog({
                autoOpen: false,
            });

            $("div.reply-edited-dialog").dialog({
                autoOpen: false,
            });

            // note may not use dialog because there is a chance it will
            // not appear well on phone
            $('#post-edited').on('click', function(){

                $('#post-edited-dialog').dialog('open');

            });

            // initialize links for editing
            $('a.edited-reply-link').on('click', function(){

                // go up a level and find the closest dialog
                $("#" + $(this).attr('dialog-link')).dialog('open')

            });

            // link for replying, generates quote in reply section
            $('a.reply-link').on('click', function(){

                var replyContent = $(this).siblings('div.reply-content').text();
                var replyUser = $(this).siblings('div.reply-user').text();
                replyContent = "<blockquote>" + replyContent + "<br>" + replyUser  + "</blockquote>\n\n"
                $("#body").val(replyContent);

                // scroll to body element
                $("html, body").animate({ scrollTop: $('#body').offset().top }, 1000);
            });
        }
    }

    return app;

});

require(['app.thread_post'], function(app){
    app.start();
});
