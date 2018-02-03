define('app.announcement', ['jquery', 'lib.ajax'], function($, AJAX) {

    var application = {

        /**
        * Start the application the for the announcements page
        */
        'start' : function() {

            // alias
            var self = this;

            // initialize event-listeners
            self.initEventListeners();
        },

        'initEventListeners' : function() {
            
            // alias
            var self = this;

            var recentArticles = $('.recent-article-element');
            var count = recentArticles.length;

            // on click of load more button add more announcements
            $("#loadmoreButton").on('click', function(){
            
                var postData = {
                    'start': count - 2,
                    'amount': 5
                };

                var url = "/announcement/get_more";
                $.post(url, postData, function(data){

                    var recentArticlesContainer = $('div.recent-article-container');
                    var amountAdded = 0;

                    // loop through all recent articles 
                    $.each(data, function(index, jsonObject) {

                        // before appending check if id already exists if so do not add.
                        var newRecentAnnounce = $('.recent-article-element');
                        var retrievedId = jsonObject.id;

                        // if there are articles on screen check to add into it
                        if (newRecentAnnounce.length > 0) {
                            newRecentAnnounce.each(function(index, article){
                            
                                var announcementId = article.attr("announcement-id");
                                var uniqueArticle = true;

                                // append content if it is not matching
                                if (parseInt(announcementId) == retrievedId) {
                                    var uniqueArticle = false;
                                }
                            })
                        } 
                        
                        // check if the announcement is not itself
                        else {

                           var announcementId = $("div.announcement-container").attr("announcement-id");
                           var uniqueArticle = true;
                           if (parseInt(announcementId) == jsonObject.id)
                               uniqueArticle = false;
                        }

                    

                        // if unique article
                        if (uniqueArticle) {
                            var thumbnail = (jsonObject.thumbnail) ? jsonObject.thumbnail : '/public/img/general/newark_full.png';
                            var articleThumbnail ='<div data-url="/announcement/' + jsonObject.id + '" class="recent-thumbnail" style="background-image:url("' + thumbnail + '")"></div>';
                            var title = (jsonObject.title) ? jsonObject.title : 'No title available';

                            var recentArticle = ['<div class="row recent-article-element">',
                                    '<div class="col-md-5">',
                                        articleThumbnail,
                                    '</div> ',
                                    '<div class="col-md-7">',
                                        '<h3>',
                                            title,
                                        '</h3>',
                                        '<p>' + jsonObject.created_at + '</p>',
                                    '</div> ',
                                '</div>',].join("");

                            recentArticlesContainer.append(recentArticle);
                        }

                    });
                })
            
            });
        }

    };

    return application;
});

// call on loading of page
require(['app.announcement'], function(app){
    app.start();
});
