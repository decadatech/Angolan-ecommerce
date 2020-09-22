<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";

    $numLinha = mysqli_real_escape_string($conexao, trim($_POST["numLinha"]));
    $colheita = mysqli_real_escape_string($conexao, trim($_POST["colheita"]));
    $descricao = mysqli_real_escape_string($conexao, trim($_POST["descricao"]));
    $data = mysqli_real_escape_string($conexao, trim($_POST["data"]));
    $data = str_replace("/", "-", $data);
    $data = date('Y-m-d', strtotime($data));

    $queryinsere = "INSERT INTO `tb11_harvest`(`tb11_colheita`, `tb11_descricao`, `tb11_data`) VALUES ('".$colheita."', '".$descricao."', '".$data."')";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);
    if($resultadoinsere && $numLinha > 0){
        $idColheita = mysqli_insert_id($conexao);
        for($i=0; $i < $numLinha; $i++){
            $idProduto = mysqli_real_escape_string($conexao, trim($_POST["provider-product"][$i]));
            $query = "INSERT INTO `tb12_harvest_products`(`tb12_id_harvest`, `tb12_id_product`) VALUES ('".$idColheita."', '".$idProduto."')";
            $resultado = mysqli_query($conexao, $query);
        }
    }
?>