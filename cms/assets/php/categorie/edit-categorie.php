<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";

    $titulo =  mysqli_real_escape_string($conexao, trim($_POST["nome"]));
    $idsub = $_POST["sub"];
    $id = $_POST["id"];

    if($idsub != $id){
        $queryinsere = "UPDATE `tb03_categorie` SET `tb03_nome`='".$titulo."', `tb03_sub`='".$idsub."' WHERE `tb03_id` = '".$id."'";
        $resultadoinsere = mysqli_query($conexao, $queryinsere);
    }
    // if($resultadoinsere){
    //     header ("Location: ../../testes/form_plans.html");
    // }else{
    //     echo "Erro: ". mysqli_error($conexao);
    // }
	
?>