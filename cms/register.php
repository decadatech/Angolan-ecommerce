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

    <h1 style="text-align: center;">Cadastro</h1>

    <form method="POST" id="formRegister">
      <div class="form-group">
        <label for="user">Usuário*</label>
        <input type="text" name="user" id="user" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha*</label>
        <input type="password" name="senha" id="senha" class="form-control" required>
      </div>
      <button type="submit"  class="btn btn-primary"> Registrar </button>
    </form>
    <a href="login.php">Faça seu login</a>

  </div>

  <!-- MODAL DE CONFIRMAÇÃO DE ENVIO -->
  <div class="modal fade" id="ModalConfirm" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Aviso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Seu registro foi inserido com sucesso</h4>
                <p>Caso seu registro seja aceito você terá acesso!</p>
            </div>
            <div class="modal-footer">
                <a href="login.php" class="btn btn-success">Ir para login</a>            
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
  </div>

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
  <!-- REGISTER JS -->
  <script src="assets/js/registerCMS.js"></script>
  
</body>

</html>