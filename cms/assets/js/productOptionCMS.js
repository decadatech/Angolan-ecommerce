$.ajax({
    url: 'assets/php/product/option/select-product-option.php',
    success: function(response) {
        $('.ajax-reponse-select-product-option').html(response);        
    },
});

//ADICIONAR OS DADOS DO OPÇÃO PRODUTO NO BANCO VIA AJAX
$('#formOptionProduct').submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/product/option/add-product-option.php',
        type: 'POST',
        data: $('#formOptionProduct').serialize(),                  
        success: function (result) {
                
            $('#formOptionProduct input').val(''); //LIMPA OS INPUTS 
            $('#ModalConfirm').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/product/option/select-product-option.php',
                success: function(response) {
                    $('.ajax-reponse-select-product-option').html(response);        
                },
            });
        },
        Error: function () {
            $('#formOptionProduct input').val(''); //LIMPA OS INPUTS
        },           
    });
});

//EDITAR OS DADOS DO SOBRE NO BANCO VIA AJAX
$('.save').click(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/product/option/edit-product-option.php',
        type: 'POST',
        data:{
            nome: $('#edit-name').val(),
            id: $('.save').data('id')  
        }
        ,                   
        success: function (result) {
                
            $('#FormModalProductOption input').val(''); //LIMPA OS INPUTS 
            $('#ModalFormProductOption').modal('hide'); //FECHA O MODAL
            $('#ModalConfirm').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/product/option/select-product-option.php',
                success: function(response) {
                    $('.ajax-reponse-select-product-option').html(response);        
                },
            });
        },
        Error: function () {
            $('#FormModalProductOption input').val(''); //LIMPA OS INPUTS
            $('#ModalFormProductOption').modal('hide'); //FECHA O MODAL
        },           
    });
});

function confirmarExclusaoOptionProduct(id) {
    var resposta = confirm("Deseja remover essa opção de produto?");
    if (resposta == true) {
        window.location.href = "assets/php/product/option/delete-product-option.php?id="+id;
    }
}   

function editarOptionProduct(id) {

    $('#ModalFormProductOption').modal('show'); //ABRE O MODAL

    let buttonId = "#"+id; //ID DO BOTAO PRESSIONADO
    $('#edit-name').val($(buttonId).data('nome'));
    $('.save').data('id', id); 

}  
