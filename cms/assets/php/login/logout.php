<?php 
    session_start();

    // $_SESSION['login'] = $login;
    // $_SESSION['senha'] = $senha;
    // $_SESSION['idUsuario'] = $idbd;
    // $_SESSION["logado"] = 1;

    unset($_SESSION['logado']);
    unset($_SESSION['nome']);

    header("Location: ../../../login.php");
?>