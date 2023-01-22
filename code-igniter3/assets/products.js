$(document).ready(function () {
    $.get('/products/view_all', function (res) {
        $('div#table').html(res);
    });
    
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
    $('#category').on('change', function () {
        $.get('search/bycategory/' + this.value, function (res) {
            $('div#table').html(res);
        });
    });
})