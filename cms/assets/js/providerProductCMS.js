$(document).ready(function() {     
    $('#valor').mask('###0,00', {reverse: true});
    $('#edit-valor').mask('###0,00', {reverse: true});
});

$(document).on("change", "#unidade", function(){
    if($(this).val() == 0){
        $('#valorUnidade').html("KG");        
    }else{
        $('#valorUnidade').html("UN");        
    }
});

$(document).on("change", "#edit-unidade", function(){
    if($(this).val() == 0){
        $('#edit-valorUnidade').html("KG");        
    }else{
        $('#edit-valorUnidade').html("UN");        
    }
});

$.ajax({
    url: 'assets/php/provider-product/select-provider-product.php',
    success: function(response) {
        $('.ajax-reponse-select-provider-product').html(response);        
    },
});

$('#formProviderProduct').submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/provider-product/add-provider-product.php',
        type: 'POST',
        data: $('#formProviderProduct').serialize(),                  
        success: function (result) {         
            $('#formProviderProduct input').val(''); //LIMPA OS INPUTS 
            $('#addProviderProductModal').modal('show'); //ABRE O MODAL      
            $.ajax({
                url: 'assets/php/provider-product/select-provider-product.php',
                success: function(response) {
                    $('.ajax-reponse-select-provider-product').html(response);        
                },
            });       
        },
        Error: function () {
            $('#formProviderProduct input').val(''); //LIMPA OS INPUTS
        },     
    });
});

//EDITAR OS DADOS DO SOBRE NO BANCO VIA AJAX
$('.save').click(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/provider-product/edit-provider-product.php',
        type: 'POST',
        data: {
            fruta: $('#edit-fruta').val(),
            estoque: $('#edit-estoque').val(), 
            unidade: $('#edit-unidade').val(),   
            valor: $('#edit-valor').val(),   
            id: $('.save').data('id')  
        },           
        success: function (result) {
                
            $('#FormModalProviderProduct input').val(''); //LIMPA OS INPUTS 
            $('#editProviderProductModal').modal('hide'); //FECHA O MODAL
            $('#editConfirmProviderProductModal').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/provider-product/select-provider-product.php',
                success: function(response) {
                    $('.ajax-reponse-select-provider-product').html(response);        
                },
            });   
        },
        Error: function () {
            $('#FormModalProviderProduct input').val(''); //LIMPA OS INPUTS 
            $('#editProviderProductModal').modal('hide'); //FECHA O MODAL
        },           
    });
});

function confirmarExclusaoProvider(id) {
    var resposta = confirm("Deseja remover esse produto?");
    if (resposta == true) {
        window.location.href = "assets/php/provider-product/delete-provider-product.php?id="+id;
    }
}   

function editProviderProduct(id) {

    $('#editProviderProductModal').modal('show'); //ABRE O MODAL

    let buttonId = "#"+id; //ID DO BOTAO PRESSIONADO      

    $('#edit-fruta').val($(buttonId).data('fruta'));
    $('#edit-estoque').val($(buttonId).data('estoque'));
    $('#edit-unidade').val($(buttonId).data('unidade'));
    $('#edit-valor').val($(buttonId).data('valor'));
    $('.save').data('id', id); 

}  