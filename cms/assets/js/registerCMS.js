//ADICIONAR OS DADOS DO REGISTRAR NO BANCO VIA AJAX
$('#formRegister').submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/login/add-register.php',
        type: 'POST',
        data: $('#formRegister').serialize(),                  
        success: function (result) {
                
            $('#formRegister input').val(''); //LIMPA OS INPUTS 
            $('#ModalConfirm').modal('show'); //ABRE O MODAL             
        },
        Error: function () {
            $('#formRegister input').val(''); //LIMPA OS INPUTS
            $('#formRegister textarea').val('');
        },           
    });
});