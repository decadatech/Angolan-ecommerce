<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $codigo = $_GET["id"];	
	
	$querydelete ="DELETE FROM tb10_providers_products WHERE tb10_id=$codigo";
	$resultadodelete = $conexao->query($querydelete);
	
		if ($resultadodelete) {		
			header ("Location: ../../../providerProduct.php");	
		}else{			
			echo "<h2>Erro ao excluir o fornecedor<h2>";
		}
	mysqli_close($conexao);

?>