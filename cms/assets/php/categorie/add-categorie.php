<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";

    $categoria =  mysqli_real_escape_string($conexao, trim($_POST["nameCategorie"]));
    $pai =  mysqli_real_escape_string($conexao, trim($_POST["categorie"]));

    $queryinsere = "INSERT INTO `tb03_categorie`(`tb03_sub`,`tb03_nome`) VALUES ('".$pai."','".$categoria."')";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

    echo $categoria;
    echo $pai;

    // if($resultadoinsere){
    //     header ("Location: ../../testes/form_plans.html");
    // }else{
    //     echo "Erro: ". mysqli_error($conexao);
    // }
	
?>