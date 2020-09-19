<?php

	session_start();
	if($_SESSION["logado"]==0){ 
		header("Location: ../login.php");
	}	

?>