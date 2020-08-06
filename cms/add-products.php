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

  <title>Adicionar Produtos - SannyKidsCMS</title>

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

      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">

            <form method="POST" id="formProduct" enctype="multipart/form-data"> 
                <h2> Informações básicas </h2>
                <div class="form-group">
                    <label for="nameProduct">Nome do Produto</label>
                    <input type="text" class="form-control" id="nameProduct" name="nameProduct" required />
                </div>                    
                <div class="form-group">
                    <label for="categorie">Categoria</label>
                    <div class="ajax-reponse-select-option-categorie-product"></div>
                </div>   
                <div class="form-group">
                    <label for="brand">Marca</label>
                    <div class="ajax-reponse-select-option-brand-product"></div>
                </div>      
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
                </div> 
                <div class="form-group">
                    <label for="stock">Estoque disponível</label>
                    <input type="number" class="form-control" id="stock" name="stock" required />
                </div>   
                <label for="priceFrom">Preço (de) (Opcional)</label>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" disabled>R$</button>
                    </div>
                    <input type="text" class="form-control" id="priceFrom" name="priceFrom" />                    
                </div>
                <label for="priceFor">Preço (por)</label>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" disabled>R$</button>
                    </div>
                    <input type="text" class="form-control" id="priceFor" name="priceFor" required />
                </div>                  
                <hr/>
                <!-- <h2> Correio </h2>
                <div class="form-group">
                    <label for="weight">Peso (em Kg)</label>
                    <input type="text" class="form-control" id="weight" name="weight" maxlength="6" required />
                </div>
                <div class="form-group">
                    <label for="width">Largura (em Cm)</label>
                    <input type="text" class="form-control" id="width" name="width" maxlength="6" required />
                </div>
                <div class="form-group">
                    <label for="length">Comprimento (em Cm)</label>
                    <input type="text" class="form-control" id="length" name="length" maxlength="6" required />
                </div>
                <div class="form-group">
                    <label for="height">Altura (em Cm)</label>
                    <input type="text" class="form-control" id="height" name="height" maxlength="6" required />
                </div>
                <div class="form-group">
                    <label for="diameter">Diâmetro (em Cm)</label>
                    <input type="text" class="form-control" id="diameter" name="diameter" maxlength="6" required />
                </div> -->
                <hr/>
                <h2> Tag do Produto </h2>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="new">
                        <label class="form-check-label" for="gridCheck"> Novo </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="oportunity">
                        <label class="form-check-label" for="gridCheck1"> Oportunidade </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck2" name="spotlight">
                        <label class="form-check-label" for="gridCheck2"> Destaque </label>
                    </div>
                </div>                
                <hr/>
                <h2> Opções </h2>
                <div class="ajax-reponse-select-option-add-product"></div>
                <hr/>                
                <h2> Imagens </h2>
                <button type="button" id="more_fields" class="btn btn-primary">+</button>
                <button type="button" id="less_fields" class="btn btn-danger">-</button>
                Clique no botão '+' para adicionar fotos
                <div id="dep" style="margin-top:25px"></div>
                <hr/>
                <button type="submit" class="btn btn-primary">Adicionar</button>

            </form>
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
                <h4>Seu Produto foi inserido com sucesso.</h4>
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
  <!--TINY Script-->
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=eijpmc7sdy2yipxuifg9fvebqq3l49ius24593k4ou1i4f0d"></script>
  <!-- PRODUCTCMS JS  -->
  <script src="assets/js/productCMS.js"></script>

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