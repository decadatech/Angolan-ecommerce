<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

	$fruta =  mysqli_real_escape_string($conexao, trim($_POST["fruta"]));
    $fornecedor =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["idFornecedor"])));
    $estoque =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["estoque"])));
    $unidade =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["unidade"])));
    $valor =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["valor"])));

    $queryinsere = "INSERT INTO `tb10_providers_products`(`tb10_fruta`, `tb10_estoque`, `tb10_unidade`, `tb10_valor`, `tb10_id_fornecedor`) VALUES ('".$fruta."', '".$estoque."', '".$unidade."', '".$valor."', '".$fornecedor."')";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);
    echo $queryinsere;
	
?>