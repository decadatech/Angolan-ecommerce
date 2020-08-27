$.ajax({
    url: 'assets/php/user/select-user.php',
    success: function(response) {
        $('.ajax-reponse-select-user').html(response);        
    },
});

function confirmarExclusaoUser(id) {
    var resposta = confirm("Deseja remover esse usuário?");
    if (resposta == true) {
        window.location.href = "assets/php/user/delete-user.php?id="+id;
    }
}   

function confirmarDarUser(id) {
    var resposta = confirm("Deseja dar permissão para entrar no painel administrativo para esse usuário?");
    if (resposta == true) {
        window.location.href = "assets/php/user/permissao-dar-user.php?id="+id;
    }
}   

function confirmarNegarUser(id) {
    var resposta = confirm("Deseja negar permissão para entrar no painel administrativo para esse usuário?");
    if (resposta == true) {
        window.location.href = "assets/php/user/permissao-negar-user.php?id="+id;
    }
}   