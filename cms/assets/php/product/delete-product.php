<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	
	
	$querydelete ="UPDATE `tb05_products` SET `tb05_estoque` = 0 WHERE tb05_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
		if ($resultadodelete) {		
			header ("Location: ../../../products.php");	
		}else{			
			echo "<h2>Erro ao excluir o produto<h2>";
		}
	mysqli_close($conexao);

?>