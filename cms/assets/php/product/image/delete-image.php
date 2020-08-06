<?php
    include_once "../../login/verificado-login-for-php.php";
    include_once "../../../../../assets/php/conexao.php";
    
    $codigo = $_POST["id"];	

    $query = "SELECT * FROM `tb08_image_products` WHERE tb08_id=$codigo";
	$result = $conexao->query($query);
	if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){ 
			$fotoBanco = $linha["tb08_imagem"];       
		}
	}  
	
	$querydelete ="DELETE FROM tb08_image_products WHERE tb08_id=$codigo";
    $resultadodelete = $conexao->query($querydelete);	
    
    if ($resultadodelete) {		
        unlink("../../../../../assets/images/products/".$fotoBanco);		
    }else{			
        echo "<h2>Erro ao excluir a imagem<h2>";
    }
		
?>