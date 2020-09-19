$('#errolog').hide();		//Esconde o erro
$('#errologpermissao').hide();		//Esconde o erro

//ADICIONAR OS DADOS DO REGISTRAR NO BANCO VIA AJAX
$('#formLogin').submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'assets/php/login/verifica-login.php',
        type: 'POST',
        data: $('#formLogin').serialize(),                  
        success: function (result) {                    
            $('#formLogin input').val(''); //LIMPA OS INPUTS
            if(result==0){						
                $('#errolog').show();		//Informa o erro
            }if(result==2){
                $('#errologpermissao').show();		//Informa o erro
            
            }if(result==1){
                window.location.href = "index.php";
            }
        },
        Error: function () {
            $('#formLogin input').val(''); //LIMPA OS INPUTS
        },           
    });
});
