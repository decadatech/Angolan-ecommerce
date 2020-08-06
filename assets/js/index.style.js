$('.more').click(function(){
    window.location.href = "produto.html";
});

$.ajax({
    url: 'assets/php/select-products.php',
    success: function(response) {
        $('.ajax-reponse-select-products').html(response);        
    },
});