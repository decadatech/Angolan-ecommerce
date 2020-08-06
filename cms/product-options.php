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

  <title>Opções de produto - SannyKidsCMS</title>


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
        <a style="background-color: #242424; color: white" href="products.php" class="list-group-item list-group-item-action">
          PRODUTO
        </a>       
        <a href="user.php" class="list-group-item list-group-item-action">
          USUÁRIO
        </a>
      </div>
    </div>
    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button style="margin: 2px" class="btn btn-secondary" id="menu-toggle"> <span class="navbar-toggler-icon"></span> </button>
        <a style="margin: 2px" href="assets/php/login/logout.php" class="btn btn-danger"> Sair </a>
      </nav>

       <div class="container-fluid" style="padding: 20px; width: 100%; display: flex; justify-content: center; align-items: center;">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="products.php">Início</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Opções do produto</li>
                    </ol>
                </nav>                
            </div>
        </div>

      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">
            <form method="POST" id="formOptionProduct">                    
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required />
                </div>                           
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>

        </div>
      </div>

      <div class="container-fluid" style="padding: 20px; width: 100%; display: flex; justify-content: center; align-items: center;">
        <div class="container">
            <h2> Opções dos produtos já inseridas</h2>  
            <div class="ajax-reponse-select-product-option"></div>
        </div>
      </div>

    </div>  

  </div>


  <div class="modal fade" id="ModalFormProductOption" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Editar Opção</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="FormModalProductOption">
                    <div class="form-row">                                
                        <div class="form-group col-md-12">
                            <label for="edit-name">Nome</label>
                            <input type="text" class="form-control" name="edit-name" id="edit-name" required>
                        </div>
                    </div>                                                                 
                </form>
            </div>
            <div class="modal-footer">                         
                <button type="submit" class="btn btn-success save">Editar</button>            
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
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
                <h4>Sua Opção foi inserido com sucesso.</h4>
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
  <!--MaskJS Script-->
  <script type="text/javascript" src="../assets/libs/jquery.mask.js"></script>
  <!-- PRODUCTOPTIONCMS JS  -->
  <script src="assets/js/productOptionCMS.js"></script>

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