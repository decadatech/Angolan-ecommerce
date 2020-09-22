<?php
  include_once "assets/php/login/verificado-login.php";
?>

<html>

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">

  <title>CMS</title>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div style="display: flex; justify-content: center; align-items: center; padding: 30px auto; margin: 15px auto;">
        <h3>Páginas</h3>
      </div>
      <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action">
          HOME
        </a>
        <a href="about.php" class="list-group-item list-group-item-action">
          SOBRE
        </a>
        <a href="categories.php" class="list-group-item list-group-item-action">
          CATEGORIAS
        </a>
        <a href="brands.php" class="list-group-item list-group-item-action">
          MARCAS
        </a>
        <a href="products.php" class="list-group-item list-group-item-action">
          PRODUTO
        </a>  
        <a style="background-color: #242424; color: white" href="providers.php" class="list-group-item list-group-item-action">
          FORNECEDORES
        </a>    
        <a href="user.php" class="list-group-item list-group-item-action">
          USUÁRIO
        </a>
      </div>
    </div>
    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light  border-bottom">
      <button style="margin: 2px" class="btn btn-secondary" id="menu-toggle"> <span class="navbar-toggler-icon"></span> </button>
        <a style="margin: 2px" href="assets/php/login/logout.php" class="btn btn-danger"> Sair </a>
        <!-- <a style="margin: 2px"><?php echo $_SESSION["nome"] ?></a> -->
      </nav>

      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <h2>Fornecedores</h2>  
          <div class="ajax-reponse-select-provider"></div>
        </div>
      </div>
    </div>

  </div>

  <div class="modal fade" id="ModalViewProvider" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nameProvider"></h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Dados de Contato</h5>          
                <div class="form-row">     
                    <div class="form-group col-md-4">
                        <b>Telefone</b>
                        <p id="view-phone"></p>
                    </div>
                    <div class="form-group col-md-8">
                        <b>E-mail</b>
                        <p id="view-email"></p>
                    </div>
                </div>    
                <div class="form-row">                                
                    <div class="form-group col-md-4">
                        <b>Número Fiscal</b>
                        <p id="view-fiscal"></p>
                    </div>                                             
                </div>   
                <h5>Dados de Endereço</h5>         
                <div class="form-row">                   
                    <div class="form-group col-md-4">
                        <b>CEP</b>
                        <p id="view-cep"></p>
                    </div>               
                    <div class="form-group col-md-8">
                        <b>Endereço</b>
                        <p id="view-endereco"></p>
                    </div>   
                </div>   
                <div class="form-row">                 
                    <div class="form-group col-md-6">
                        <b>Bairro</b>
                        <p id="view-bairro"></p>
                    </div>                        
                    <div class="form-group col-md-6">
                        <b>Cidade</b>
                        <p id="view-cidade"></p>
                    </div>                  
                </div>  
                <div class="form-row">                 
                    <div class="form-group col-md-12">
                        <b>Complemento</b>
                        <p id="view-complemento"></p>
                    </div>                       
                </div>                                                             
            </div>
            <div class="modal-footer">                         
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
  <!-- CONTACT JS  -->
  <script src="assets/js/providerCMS.js"></script>

  <script>
    $(document).ready(function() {
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });     
    });
  </script>
</body>

</html>