<?php
    include_once "../../login/verificado-login-for-php.php";
    include_once "../../../../../assets/php/conexao.php";

	$titulo =  mysqli_real_escape_string($conexao, trim($_POST["name"]));

    $queryinsere = "INSERT INTO `tb06_options`(`tb06_nome`) VALUES ('".$titulo."')";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

    // if($resultadoinsere){
    //     header ("Location: ../../testes/form_plans.html");
    // }else{
    //     echo "Erro: ". mysqli_error($conexao);
    // }
	
?>