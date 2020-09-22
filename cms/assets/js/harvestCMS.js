var url_string = window.location.href;
var url = new URL(url_string);
var id = url.searchParams.get("id");

var numLinha = 0;

$(document).ready(function() {     
    $("#data").mask("99/99/9999");
});

$("#more_fields").click(function() {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/provider-product/select-provider-product-option.php',
        type: 'POST',
        data: {id:id},
        success: function(response) {
            $("#dep").append(response);
            numLinha = parseInt($("#numLinha").val())
            numLinha += 1;
            $("#numLinha").val(numLinha);
        },
    });    
});

$("#less_fields").click(function() {
    event.preventDefault();
    $('#dep').children('div').last().remove();
    numLinha = parseInt($("#numLinha").val())
    if(numLinha != 0){
        numLinha -= 1;
        $("#numLinha").val(numLinha);
    }
});

$('#formHarvestProduct').submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/harvest/add-harvest.php',
        type: 'POST',
        data: $('#formHarvestProduct').serialize(),                  
        success: function (result) {         
            $('#formHarvestProduct input').val(''); //LIMPA OS INPUTS 
            $('#formHarvestProduct textarea').val('');        
            $('#addHarvestProductModal').modal('show'); //ABRE O MODAL 
            $('#addHarvestProductModal').on('hidden.bs.modal', function () {
                location.reload();
            }) 
        },
        Error: function () {
            $('#formHarvestProduct input').val(''); //LIMPA OS INPUTS
            $('#formHarvestProduct textarea').val('');
        },     
    });
});