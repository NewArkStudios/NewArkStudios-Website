/**
* Javascript meant to update the posts
* with appropriate UI elements
*/
define('app.thread_post', ['jquery', 'jquery_ui', 'lib.editor', 'lib.ajax'], function($, UI, Editor, AJAX){

    var app = {

        'start' : function() {

            Editor.initEditor("#body");

            // update form textarea before submit so that we can submit
            $('#reply-editor').on('submit', function(){
                var editorContent = Editor.tinyMCE.activeEditor.getContent({'format' : 'raw'})
                $('#body').html(editorContent);
            });

            // on click event for preview section update its preview section
            $('#preview-button').on('click', function(){
                $("#preview-content").html(Editor.tinyMCE.activeEditor.getContent({'format' : 'raw'}));
            });

            // initialize content for page
            $("div.edited_dialog").dialog({
                autoOpen: false,
                maxHeight: 500, 
            });

            // note may not use dialog because there is a chance it will not appear well on phone
            // open dialog for edited post
            $('#post-edited').on('click', function(){
                $('#post-edited-dialog').dialog('open');
            });

            // initialize links for edited replies
            $('a.edited-reply-link').on('click', function(){

                // go up a level and find the closest dialog
                $("#" + $(this).attr('dialog-link')).dialog('open')
            });

            // link for replying, generates quote in reply section
            $('button.reply-link').on('click', function(){

                var replyContent = $(this).siblings('div.reply-content').html();
                var replyUser = $(this).attr('data-reply-user');
                replyContent = "<blockquote style='background-color:#f5f5f5;'>" + replyContent + "<br>From: " + replyUser  + "</blockquote><p></p>\n\n"
                Editor.tinyMCE.activeEditor.setContent(replyContent);

                // scroll to body element
                $("html, body").animate({ scrollTop: $('#body').offset().top }, 1000);
            });

            // icon for liking post
            var postLikeIcon = $('span.post_like');
            if (!postLikeIcon.hasClass('disabled')) {
                postLikeIcon.on('click', function() {

                    var icon = $(this);

                    icon.addClass('disabled');
                    // note all post_ids are the same anyways, on click disable button
                    $.post('/thread/like_post', {'post_id' : $('input[name="post_id"]').val()},  function(data) {
                       var liketext = icon.closest('.panel-body').find('div.meta_data .likes_count');
                       var likescount = parseInt(liketext.attr('data-count')) + 1;
                       liketext.attr('data-count', likescount);
                       liketext.text("Likes: " + likescount);


                       var sibling = icon.parent().find('span.post_dislike')

                       if (sibling.hasClass('disabled')) {
                           var disliketext = icon.closest('.panel-body').find('div.meta_data .dislikes_count');
                           var dislikescount = parseInt(disliketext.attr('data-count')) - 1;
                           disliketext.text("Dislikes: " + dislikescount);
                           disliketext.attr('data-count', dislikescount);
                           sibling.removeClass('disabled');
                       }
                    })
                });
            }

            // icon for disliking post
            $('span.post_dislike').on('click', function() {

                var icon = $(this);

                icon.addClass('disabled');
                // note all post_ids are the same anyways
                $.post('/thread/dislike_post', {'post_id' : $('input[name="post_id"]').val()},  function(data) {

                     var disliketext = icon.closest('.panel-body').find('div.meta_data .dislikes_count');
                     var dislikescount = parseInt(disliketext.attr('data-count')) + 1;
                     disliketext.attr('data-count', dislikescount);
                     disliketext.text("Dislikes: " + dislikescount);

                     var sibling = icon.parent().find('span.post_like')
                     if (sibling.hasClass('disabled')) {
                         var liketext = icon.closest('.panel-body').find('div.meta_data .likes_count');
                         var likescount = parseInt(liketext.attr('data-count')) - 1;
                         liketext.attr('data-count', likescount);
                         liketext.text("Likes: " + likescount);
                         sibling.removeClass('disabled');
                     }
                })
            });
        }
    }

    return app;

});

// start app on page load
require(['app.thread_post'], function(app){
    app.start();
});
