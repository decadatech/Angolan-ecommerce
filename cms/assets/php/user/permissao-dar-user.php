<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	
	
	$querydelete ="UPDATE `tb01_login` SET tb01_ativo = 1 WHERE tb01_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
		if ($resultadodelete) {		
			header ("Location: ../../../user.php");	
		}else{			
			echo "<h2>Erro ao dar permissão ao usuário<h2>";
		}
	mysqli_close($conexao);

?>