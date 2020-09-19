var url_string = window.location.href;
var url = new URL(url_string);
var id = url.searchParams.get("id");

$("#more_fields").click(function() {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/provider-product/select-provider-product-option.php',
        type: 'POST',
        data: {id:id},
        success: function(response) {
            $("#dep").append(response);
        },
    });    
});

$("#less_fields").click(function() {
    event.preventDefault();
    $('#dep').children('div').last().remove();
});