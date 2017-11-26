define('app.admin_panel', ['jquery', 'datatables', 'lib.editor', 'lib.ajax'], function($, DT, Editor, AJAX){

    var application = {

        'start' : function(){

            // alias
            var self = this;

            Editor.initEditor("#body");

            // update textarea before submit so that information can be sent
            // could not figure out why submit would not trigger
            $("#announcement-form").on('click', function(){
                var editorContent = Editor.tinyMCE.activeEditor.getContent({'format' : 'raw'})
                $('#body').html(editorContent);
            });

            // on click event for preview section
            $('#preview-button').on('click', function(){
                var editorContent = Editor.tinyMCE.activeEditor.getContent({'format' : 'raw'})
                $("#preview-content").html(editorContent);
            });

            // AJAX to get moderators on start of application
            // then initialize components based off this
            $.get('/admin/get_moderators', function(data, status) {

                self.initTable(data);

                // add event listener
                $('button.removemod-btn').on('click', function(){

                    // AJAX call to delete moderators
                    var url = '/admin/delete_moderator';
                    var id = $(this).attr('data-user');

                    $.post(url,{'mod_id': id}, function(data, status){

                        if (data.success && data.success == true) {
                            $.get('/admin/get_moderators', function(data, status) {
                                self.initTable(data);
                            });
                        }
                    });
                });
            });
        },

        /**
         * Transform data to readable jquery datatable format
         */
         'transformData' : function (data) {

            // loop through each function
            $.each(data, function(index, element){
                element['removebutton'] = null;
            });

            return data;
        },


        'initTable' : function(data) {
        
            // alias
            var self = this;

            if ($.fn.dataTable.isDataTable('#moderator-table'))
               $('#moderator-table').DataTable().destroy();

            // start data table initialization
            $('#moderator-table').DataTable({
                "columns" : [
                    {
                        "data": "name",
                        "title": "User-Name",
                        "render": function(data, type, full, meta) {

                            return "<a target='blank' href='/profile/" + data + "'>" + data + "</a>"
                        }
                    },
                    {
                        "data": "first_name",
                        "title": "First Name",
                    },
                    {
                        "data": "last_name",
                        "title": "Last Name",
                    },
                    {
                        "data": "email",
                        "title": "Email",
                    },
                    {
                        "data": "removebutton",
                        "title": "Remove",
                        "render" : function (data, type, full, meta) {
                            return "<button data-user='" + full['id'] + "' class='removemod-btn btn btn-default'>Remove Moderator</button>";
                        },
                    },
                ],
                "data" : self.transformData(data)
            });
        }
    };

    return application;
});

// call on loading of page
require(['app.admin_panel'], function(app){
    app.start();
});
