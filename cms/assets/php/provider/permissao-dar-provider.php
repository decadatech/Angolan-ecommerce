<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	
	
	$querydelete ="UPDATE `tb09_login` SET tb09_ativo = 1 WHERE tb09_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
		if ($resultadodelete) {		
			header ("Location: ../../../providers.php");	
		}else{			
			echo "<h2>Erro ao dar permissão ao fornecedor<h2>";
		}
	mysqli_close($conexao);

?>