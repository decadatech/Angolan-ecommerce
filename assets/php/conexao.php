<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "bd_nuhkampo";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
    mysqli_set_charset($conexao,"utf8");
    
    if(!$conexao){

        die("Falha na conexao: ". 
            mysqli_connect_error());
    }

?>