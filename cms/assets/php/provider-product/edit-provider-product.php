<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

	$fruta =  mysqli_real_escape_string($conexao, trim($_POST["fruta"]));
    $estoque =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["estoque"])));
    $unidade =  mysqli_real_escape_string($conexao, trim($_POST["unidade"]));
    $valor =  mysqli_real_escape_string($conexao, trim($_POST["unidade"]));
    $id = $_POST["id"];

    $queryinsere = "UPDATE `tb10_providers_products` SET `tb10_fruta`='".$fruta."',`tb10_estoque`='".$estoque."',`tb10_unidade`='".$unidade."',`tb10_valor`='".$valor."' WHERE `tb10_id` = $id";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

	
?>