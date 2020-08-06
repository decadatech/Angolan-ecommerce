<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

	$nome =  mysqli_real_escape_string($conexao, trim($_POST["nome"]));
    $id = $_POST["id"];

    $queryinsere = "UPDATE `tb04_brand` SET `tb04_nome`='".$nome."' WHERE `tb04_id` = '".$id."'";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

	
?>