<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
	$codigo = $_POST["idDelete"];	
	
	// $query = $conexao->query("SELECT tb04_id FROM tb04_produtos WHERE tb04_id_marca = $codigo");
	// if($query->num_rows>0) {         
	// 	return 0;
	// }else{
		$query = "SELECT * FROM `tb04_brand` WHERE tb04_id=$codigo";
		$result = $conexao->query($query);
		if($result->num_rows>0) { 
			while ($linha = $result->fetch_assoc()){ 
				$fotoBanco = $linha["tb04_imagem"];       
			}
		} 

		$querydelete ="DELETE FROM tb04_brand WHERE tb04_id=$codigo";
		$resultadodelete = $conexao->query($querydelete);
		
			if ($resultadodelete) {		
				unlink("../../../../assets/images/brands/".$fotoBanco);	
			}else{			
				echo "<h2>Erro ao excluir a marca<h2>";
			}
		mysqli_close($conexao);
	// }

	header ("Location: ../../../brands.php");		


?>