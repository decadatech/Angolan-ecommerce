<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

	$titulo =  mysqli_real_escape_string($conexao, trim($_POST["titulo"]));
    $descricao =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["descricao"])));
    $icone =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["icon"])));

    $queryinsere = "INSERT INTO `tb02_about`(`tb02_titulo`, `tb02_descricao`, `tb02_icone`) VALUES ('".$titulo."', '".$descricao."', '".$icone."')";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

    // if($resultadoinsere){
    //     header ("Location: ../../testes/form_plans.html");
    // }else{
    //     echo "Erro: ". mysqli_error($conexao);
    // }
	
?>