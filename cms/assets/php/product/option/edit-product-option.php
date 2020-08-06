<?php
    include_once "../../login/verificado-login-for-php.php";
    include_once "../../../../../assets/php/conexao.php";

    $titulo =  mysqli_real_escape_string($conexao, trim($_POST["nome"]));
    $id = $_POST["id"];

    $queryinsere = "UPDATE `tb06_options` SET `tb06_nome`='".$titulo."' WHERE `tb06_id` = '".$id."'";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

    // if($resultadoinsere){
    //     header ("Location: ../../testes/form_plans.html");
    // }else{
    //     echo "Erro: ". mysqli_error($conexao);
    // }
	
?>