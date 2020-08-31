$.ajax({
    url: 'assets/php/about/select-about.php',
    success: function(response) {
        $('.ajax-reponse-select-about').html(response);        
    },
});

$('#formAbout').submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/about/add-about.php',
        type: 'POST',
        data: $('#formAbout').serialize(),                  
        success: function (result) {         
            $('#formAbout input').val(''); //LIMPA OS INPUTS 
            $('#formAbout textarea').val('');        
            $(".custom-control-input").prop('checked', false); 
            $('#addAboutModal').modal('show'); //ABRE O MODAL      
            $.ajax({
                url: 'assets/php/about/select-about.php',
                success: function(response) {
                    $('.ajax-reponse-select-about').html(response);        
                },
            });       
        },
        Error: function () {
            $('#formAbout input').val(''); //LIMPA OS INPUTS
            $('#formAbout textarea').val('');
            $(".custom-control-input").prop('checked', false); 
        },     
    });
});

//EDITAR OS DADOS DO SOBRE NO BANCO VIA AJAX
$('.save').click(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/about/edit-about.php',
        type: 'POST',
        data: {
            titulo: $('#edit-titulo').val(),
            descricao: $('#edit-descricao').val(), 
            icone: $('[name=edit-icon]').val(),   
            id: $('.save').data('aboutId')  
        },           
        success: function (result) {
                
            $('#editAboutModal input').val(''); //LIMPA OS INPUTS 
            $('#editAboutModal textarea').val(''); 
            $(".custom-control-input").prop('checked', false); 
            $('#editAboutModal').modal('hide'); //FECHA O MODAL
            $('#editConfirmAboutModal').modal('show'); //ABRE O MODAL 
            $.ajax({
                url: 'assets/php/about/select-about.php',
                success: function(response) {
                    $('.ajax-reponse-select-about').html(response);        
                },
            });
        },
        Error: function () {
            $('#editAboutModal input').val(''); //LIMPA OS INPUTS
            $('#editAboutModal textarea').val('');
            $(".custom-control-input").prop('checked', false); 
            $('#editAboutModal').modal('hide'); //FECHA O MODAL
        },           
    });
});

function confirmarExclusaoAbout(id) {
    var resposta = confirm("Deseja remover esse sobre?");
    if (resposta == true) {
        window.location.href = "assets/php/about/delete-about.php?id="+id;
    }
}   

function editarAbout(id) {

    $('#editAboutModal').modal('show'); //ABRE O MODAL

    let buttonId = "#"+id; //ID DO BOTAO PRESSIONADO
    let IconClasse = "."+$(buttonId).data('icone');
    $('#edit-titulo').val($(buttonId).data('titulo'));
    $('#edit-descricao').val($(buttonId).data('descricao'));
    $(IconClasse).prop('checked', true); 
    $('.save').data('aboutId', id); 

}  