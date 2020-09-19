<?php
    include_once "../../../../assets/php/conexao.php";

	$nome =  mysqli_real_escape_string($conexao, trim($_POST["nome"]));
	$telefone =  mysqli_real_escape_string($conexao, trim($_POST["telefone"]));
	$fiscal =  mysqli_real_escape_string($conexao, trim($_POST["fiscal"]));
	$cep =  mysqli_real_escape_string($conexao, trim($_POST["cep"]));
	$endereco =  mysqli_real_escape_string($conexao, trim($_POST["endereco"]));
	$numero =  mysqli_real_escape_string($conexao, trim($_POST["numero"]));
	$bairro =  mysqli_real_escape_string($conexao, trim($_POST["bairro"]));
	$complemento =  mysqli_real_escape_string($conexao, trim($_POST["complemento"]));
	$cidade =  mysqli_real_escape_string($conexao, trim($_POST["cidade"]));
	$email =  mysqli_real_escape_string($conexao, trim($_POST["email"]));
	$usuario =  mysqli_real_escape_string($conexao, trim($_POST["usuario"]));
    $senha =  mysqli_real_escape_string($conexao, trim($_POST["senha"]));
    $senhaHash = md5($senha);

    $queryinsere = "INSERT INTO `tb09_providers`(`tb09_nome`, `tb09_telefone`, `tb09_numero_fiscal`, `tb09_cep`, `tb09_endereco`, `tb09_numero`, `tb09_bairro`, `tb09_complemento`, `tb09_cidade`, `tb09_email`, `tb09_usuario`, `tb09_senha`, `tb09_data_cadastro`, `tb09_ativo`) VALUES ('".$nome."', '".$telefone."', '".$fiscal."', '".$cep."', '".$endereco."', '".$numero."', '".$bairro."', '".$complemento."', '".$cidade."', '".$email."', '".$usuario."', '".$senhaHash."', NOW(), 0)";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

    // if($resultadoinsere){
    //     header ("Location: ../../testes/form_plans.html");
    // }else{
    //     echo "Erro: ". mysqli_error($conexao);
    // }
	
?>