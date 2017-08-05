
// on click event for preview section
$('#preview-button').on('click', function(){

    // update preview section
    $("#preview-content").html($("#body").val());

});



/**
 * Transform data to readable jquery datatable format
 */
function transformData (data) {

    // loop through reformatting to jquery data format
    var tableData = [];

    // loop through each function
    $.each(data, function(index, element){

        var entry = [];
        entry.push(element['name']);

        tableData.push(entry);
    });

    return tableData;
}


// AJAX to get moderators
$.get('/admin/get_moderators', function(data, status){

    // start data table initialization
    $('#moderator-table').DataTable({
        "columns":[
            {
                "title": "Name",
            },
        ],
        "data" : transformData(data)
    });
});
