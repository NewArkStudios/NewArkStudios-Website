
// on click event for preview section
$('#preview-button').on('click', function(){

    // update preview section
    $("#preview-content").html($("#body").val());

});


// start data table example
$('#example').DataTable();


// AJAX to get moderators
$.get('/admin/get_moderators', function(data, status){

    console.log(data);
});
