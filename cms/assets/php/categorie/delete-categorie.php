<?php
    include_once "../login/verificado-login-for-php.php";
	include_once "../../../../assets/php/conexao.php";
	
	$codigoGet = $_POST["idDelete"];	

	$categorieArray = categoryView($codigoGet);
	$productTest = productsCategorie($categorieArray);
	
	
	function categoryView($codigo, $categorie = array()){
		if(!in_array($codigo, $categorie)){
			$categorie[] = $codigo;
		}

		global $conexao;
        $query = $conexao->query("SELECT tb02_id FROM tb03_categorie WHERE tb03_sub = $codigo");
        if($query->num_rows>0) {           
            while ($linha = $query->fetch_assoc()){                
				if(!in_array($linha['tb02_id'], $categorie)){
					$categorie[] = $linha['tb02_id'];
				}

				$categorie = categoryView($linha['tb02_id'], $categorie);
			}             
		}

		return $categorie;     
	}
	
	function productsCategorie($array) {
		global $conexao;

		$query = $conexao->query("SELECT tb04_id FROM tb04_produtos WHERE tb04_id_categoria IN (".implode(',', $array).")");
		if($query->num_rows>0) {         
			return 0;
		}else{
			deleteCategories($array);
		}
		
	}
	
	
	function deleteCategories($array) {
		global $conexao;

		$querydelete ="DELETE FROM `tb03_categorie` WHERE tb03_id IN (".implode(',', $array).")";
		$resultadodelete = $conexao->query($querydelete);
		
			if ($resultadodelete) {		
				header ("Location: ../../../categories.php");	
			}else{			
				echo "<h2>Erro ao excluir a categoria<h2>";
			}
		mysqli_close($conexao);
	}
	

?>