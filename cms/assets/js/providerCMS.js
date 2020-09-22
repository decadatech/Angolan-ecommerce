$.ajax({
    url: 'assets/php/provider/select-provider.php',
    success: function(response) {
        $('.ajax-reponse-select-provider').html(response);        
    },
});

function confirmarExclusaoProvider(id) {
    var resposta = confirm("Deseja remover esse fornecedor?");
    if (resposta == true) {
        window.location.href = "assets/php/provider/delete-provider.php?id="+id;
    }
}   

function confirmarDarProvider(id) {
    var resposta = confirm("Deseja dar permissão para entrar no painel administrativo para esse fornecedor?");
    if (resposta == true) {
        window.location.href = "assets/php/provider/permissao-dar-provider.php?id="+id;
    }
}   

function confirmarNegarProvider(id) {
    var resposta = confirm("Deseja negar permissão para entrar no painel administrativo para esse fornecedor?");
    if (resposta == true) {
        window.location.href = "assets/php/provider/permissao-negar-provider.php?id="+id;
    }
}   

function viewProduct(id) {
    window.location.href = "providerProduct.php?id="+id;
}   

function viewProvider(id) {

    $('#ModalViewProvider').modal('show'); //ABRE O MODAL

    let buttonId = "#"+id; //ID DO BOTAO PRESSIONADO      

    $('#nameProvider').html($(buttonId).data('nome'));
    $('#view-phone').html($(buttonId).data('telefone'));
    $('#view-email').html($(buttonId).data('email'));
    $('#view-fiscal').html($(buttonId).data('fiscal'));
    $('#view-cep').html($(buttonId).data('cep'));
    $('#view-endereco').html($(buttonId).data('endereco') + " - " + $(buttonId).data('numero'));
    $('#view-bairro').html($(buttonId).data('bairro'));
    $('#view-cidade').html($(buttonId).data('cidade'));
    $('#view-complemento').html($(buttonId).data('complemento'));
}  