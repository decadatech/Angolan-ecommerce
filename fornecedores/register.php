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
      margin-top: 50px;
    }

    @media (min-width : 768px) {
      .box {
        width: 1000px;
        position: relative;
      }
    }
  </style>

  <div class="container box">
    <h1 style="text-align: center;">Cadastro de Fornecedores</h1>
    <form method="POST" id="formRegister">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="fiscal">Número Fiscal</label>
            <input type="number" name="fiscal" id="fiscal" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" required>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" required>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="numero">Nº</label>
            <input type="text" name="numero" id="numero" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" class="form-control" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="complemento">Complemento (Opcional)</label>
            <input type="text" name="complemento" id="complemento" class="form-control" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" class="form-control" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" id="usuario" class="form-control" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary"> Registrar </button>
          <a href="login.php">Faça seu login</a>
        </div>
      </div>

    </form>
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
  <script src="../assets/libs/jquery.mask.js"></script>
  <!-- REGISTER JS -->
  <script src="assets/js/registerCMS.js"></script>
  
</body>

</html>