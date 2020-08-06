$.ajax({
    url: 'assets/php/categorie/select-option-categorie.php',
    success: function(response) {
        $('.ajax-reponse-select-option-categorie').html(response);        
    },
});

$.ajax({
    url: 'assets/php/categorie/select-categorie.php',
    success: function(response) {
        $('.ajax-reponse-select-categorie').html(response);        
    },
});

$.ajax({
    url: 'assets/php/categorie/select-option-edit-categorie.php',
    success: function(response) {
        $('.ajax-reponse-select-option-edit-categorie').html(response);        
    },
});

//ADICIONAR OS DADOS DO SOBRE NO BANCO VIA AJAX
$('#formCategorie').submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/categorie/add-categorie.php',
        type: 'POST',
        data: $('#formCategorie').serialize(),                  
        success: function (result) {
                
            $('#formCategorie input').val(''); //LIMPA OS INPUTS 
            $('#ModalConfirm').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/categorie/select-categorie.php',
                success: function(response) {
                    $('.ajax-reponse-select-categorie').html(response);        
                },
            });
            $.ajax({
                url: 'assets/php/categorie/select-option-categorie.php',
                success: function(response) {
                    $('.ajax-reponse-select-option-categorie').html(response);        
                },
            });
        },
        Error: function () {
            $('#formCategorie input').val(''); //LIMPA OS INPUTS
        },           
    });
});

//EDITAR OS DADOS DO SOBRE NO BANCO VIA AJAX
$('.save').click(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/categorie/edit-categorie.php',
        type: 'POST',
        data:{
            nome: $('#edit-name').val(),
            sub: $('#categorieEdit').val(),
            id: $('.save').data('id')  
        }
        ,                   
        success: function (result) {
                
            $('#FormModalCategories input').val(''); //LIMPA OS INPUTS 
            $('#ModalFormCategorie').modal('hide'); //FECHA O MODAL
            $('#ModalConfirm').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/categorie/select-categorie.php',
                success: function(response) {
                    $('.ajax-reponse-select-categorie').html(response);        
                },
            });
            $.ajax({
                url: 'assets/php/categorie/select-option-edit-categorie.php',
                success: function(response) {
                    $('.ajax-reponse-select-option-edit-categorie').html(response);        
                },
            });
            
        },
        Error: function () {
            $('#FormModalCategories input').val(''); //LIMPA OS INPUTS
            $('#ModalFormCategorie').modal('hide'); //FECHA O MODAL
        },           
    });
});

// function confirmarExclusaoCategorie(id) {
//     var resposta = confirm("Deseja remover essa categoria?");
//     if (resposta == true) {
//         window.location.href = "assets/php/categorie/delete-categorie.php?id="+id;
//     }
// }   

function deleteCategorie(idDelete) {
    event.preventDefault();
    var resposta = confirm("Deseja remover essa categoria?");
    if (resposta == true) {
     
        $.ajax({
            url: 'assets/php/categorie/delete-categorie.php',
            type: 'POST',
            data: { idDelete: idDelete },
            success: function (result) {
                if(result == 0){
                    alert('Categoria em uso em algum produto, para excluir altere a categoria do produto');
                }else{
                    $('#ModalConfirm').modal('show'); //ABRE O MODAL 
                    $.ajax({
                        url: 'assets/php/categorie/select-categorie.php',
                        success: function(response) {
                            $('.ajax-reponse-select-categorie').html(response);        
                        },
                    });
                    $.ajax({
                        url: 'assets/php/categorie/select-option-edit-categorie.php',
                        success: function(response) {
                            $('.ajax-reponse-select-option-edit-categorie').html(response);        
                        },
                    });
                }            
            },
            Error: function () {
                $('#formCategorie input').val(''); //LIMPA OS INPUTS
            },           
        });
    }
}

function editarCategorie(id) {

    $('#ModalFormCategorie').modal('show'); //ABRE O MODAL

    let buttonId = "#"+id; //ID DO BOTAO PRESSIONADO
    $('#edit-name').val($(buttonId).data('nome'));
    $('.save').data('id', id); 

}  
