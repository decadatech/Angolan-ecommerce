<?php
    include_once "../../login/verificado-login-for-php.php";
    include_once "../../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	
	
	$querydelete ="DELETE FROM tb06_options WHERE tb06_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
		if ($resultadodelete) {		
			header ("Location: ../../../../product-options.php");	
		}else{			
			echo "<h2>Erro ao excluir a marca<h2>";
		}
	mysqli_close($conexao);

?>