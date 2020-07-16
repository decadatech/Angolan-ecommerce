<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";

	$titulo =  mysqli_real_escape_string($conexao, trim($_POST["titulo"]));
    $descricao =  mysqli_real_escape_string($conexao, trim(nl2br($_POST["descricao"])));
    $icone =  mysqli_real_escape_string($conexao, trim($_POST["icone"]));
    $id = $_POST["id"];

    $queryinsere = "UPDATE `tb02_about` SET `tb02_titulo`='".$titulo."',`tb02_descricao`='".$descricao."',`tb02_icone`='".$icone."' WHERE `tb02_id` = '".$id."'";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

	
?>