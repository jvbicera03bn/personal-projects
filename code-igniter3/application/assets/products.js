$(document).ready(function () {

    $.get('/products/view_all', function (res) {
        $('div#table').html(res);
    });
    /* on type If searc bar is empty show all products else get http request From partial then add it to the main layout*/
    $('input#search_input').keyup(function () {
        if (this.value == '') {
            $.get('/products/view_all', function (res) {
                $('div#table').html(res);
            });
        } else {
            $.get('search/byname/' + this.value, function (res) {
                $('div#table').html(res);
            });
        }
    });
    /* Search base on category */
    $('#category').on('change', function () {
        $.get('search/bycategory/' + this.value, function (res) {
            $('div#table').html(res);
        });
    });
})