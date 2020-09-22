<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	
	
	$querydelete ="DELETE FROM tb01_login WHERE tb01_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
		if ($resultadodelete) {		
			header ("Location: ../../../user.php");	
		}else{			
			echo "<h2>Erro ao excluir o usuário<h2>";
		}
	mysqli_close($conexao);

?>