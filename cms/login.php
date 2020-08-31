<html>

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Bootstrap JS CDN -->
  <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">

  <title>CMS</title>
  
</head>

<body>

  <style>
    .box {
      margin-top: 150px;
    }

    @media (min-width : 768px) {
      .box {
        width: 500px;
        position: relative;
      }
    }
  </style>

  <div class="container box">

    <h1 style="text-align: center;">Login</h1>
    <div id="errolog" class="alert alert-danger" role="alert">
      Usuário ou senha errado!
    </div>
    <div id="errologpermissao" class="alert alert-danger" role="alert">
      Usuário sem permissão!
    </div>
    <form method="POST" id="formLogin">
      <div class="form-group">
        <label for="user">Usuário*</label>        
        <input type="text" name="user" id="user" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha*</label>
        <input type="password" name="senha" id="senha" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary" >Entrar</button>
    </form>
    <a href="register.php">Cadastre um novo usuário</a>
  </div>

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
  <!-- LOGIN JS -->
  <script src="assets/js/loginCMS.js"></script>

</body>

</html>