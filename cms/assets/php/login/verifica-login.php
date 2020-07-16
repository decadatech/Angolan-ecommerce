<?php
	session_start();
    include_once "../../../../assets/php/conexao.php";

	if(empty($_POST['user']) || empty($_POST['senha'])) {
		header('Location: ../../../login.php');
		exit();
	}

	$usuario = mysqli_real_escape_string($conexao, $_POST['user']);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$senhaHash = md5($senha);

	$query = "SELECT * FROM tb01_login WHERE tb01_usuario = '".$usuario."' AND tb01_senha = '".$senhaHash."'";
	$resultadoselect = $conexao->query($query);


	if($resultadoselect->num_rows>0) { 
    	while ($linha = $resultadoselect->fetch_assoc()){  

			$loginbd = $linha["tb01_usuario"];
			$senhabd = $linha["tb01_senha"];
			$ativo = $linha["tb01_ativo"];

	        if($usuario == $loginbd && $senhaHash == $senhabd){
				if($ativo == 1){
					echo 1;
					$_SESSION["logado"] = 1;    
					$_SESSION["nome"] = $loginbd;                            
					// header("Location:../../index.php");
					exit();
				}else{
					echo 2;
					$_SESSION['nao_autenticado'] = true;
					exit();
				}
			}
    	}
    }else{
        echo 0;
		$_SESSION['nao_autenticado'] = true;
		exit();
	}    

	// if($row == 1) {
	// 	$_SESSION['email'] = $usuario;
	// 	header('Location: perfil.php');
	// exit();
	// } else {
	// 	$_SESSION['nao_autenticado'] = true;
	// 	header('Location: logar.php');
	// 	exit();
	// }
?>