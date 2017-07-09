/**
 * https://stackoverflow.com/questions/7731778/get-query-string-parameters-with-jquery
 * @param {*} key - string containing the paramater we wish to match
 * */
function queryParam(key) {
    key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, "\\$&"); // escape RegEx meta chars
    var match = location.search.match(new RegExp("[?&]"+key+"=([^&]+)(&|$)"));
    return match && decodeURIComponent(match[1].replace(/\+/g, " "));
}


var param = queryParam('page');

// Redirect to Posts tab because pagination in laravel is done through
// query links which redirects the page to the home
if (param != null) {
    $('a[href=\\#posts\\-section]').trigger('click');
}