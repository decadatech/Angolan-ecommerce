<?php
  include_once "assets/php/login/verificado-login.php";
  include_once "../assets/php/conexao.php";

  if(!empty($_GET['id'])){
    $id = (int)($_GET['id']); 

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
          <h2>Cadastrar Colheita</h2>        
        </div>
      </div>

      <div class="container-fluid" style="padding: 20px; width: 100%; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <form method="POST" id="formHarvestProduct">                  
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="colheita">Nome Colheita</label>
                  <input type="text" name="colheita" id="colheita" class="form-control" required>
                </div>   
                <div class="col-md-6">
                  <label for="data">Data de Colheita</label>
                  <input type="text" name="data" id="data" class="form-control" required>
                </div>         
              </div>              
            </div>              
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label for="descricao">Descrição (Opcional)</label>
                  <textarea type="text" class="form-control" name="descricao" rows="2" id="descricao" required> </textarea>
                </div>               
              </div>   
            </div>           
            <div class="form-group">
                <p for="fornecedor">Produtos</p>
                <button type="button" id="more_fields" class="btn btn-primary">+</button>
                <button type="button" id="less_fields" class="btn btn-danger">-</button>
                Clique no botão '+' para adicionar os produtos
                <div id="dep" style="margin-top:25px"></div>
            </div>   
                <input type="hidden" name="numLinha" id="numLinha" value="0" class="form-control">
                <button type="submit" class="btn btn-primary">Adicionar</button>
          </form>
        </div>
      </div>    

      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <h2>Colheita Cadastradas</h2>  
          <div class="ajax-reponse-select-provider-product"></div>
        </div>
      </div>

  </div>

  <div id="addHarvestProductModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adição feita!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
            <p>Sua colheita foi inserido com sucesso.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>    

  <div class="modal fade" id="editProviderProductModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel">Editar Produto</h5>
              <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="POST" id="FormModalWork">
                  <div class="form-row">                                
                      <div class="form-group col-md-12">
                          <label for="edit-fruta">Nome Fruta</label>
                          <input type="text" class="form-control" name="edit-fruta" id="edit-fruta" required>
                      </div>
                  </div>   
                  <div class="form-row">                                
                      <div class="form-group col-md-6">
                          <label for="edit-estoque">Estoque</label>
                          <input type="number" class="form-control" name="edit-estoque" id="edit-estoque" required>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="edit-unidade">Unidade</label>
                          <select name="edit-unidade" id="edit-unidade" class="form-control">
                            <option value="0">KG</option>
                            <option value="1">UN</option>
                          </select>                          
                      </div>
                  </div>       
                  <div class="form-row">                                
                      <div class="form-group col-md-12">
                          <label for="edit-valor">Valor por <span id="edit-valorUnidade">KG</span></label>
                          <input type="text" class="form-control" name="edit-valor" id="edit-valor" required>
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

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="../assets/libs/jquery.mask.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
  <!-- CONTACT JS  -->
  <script src="assets/js/harvestCMS.js"></script>

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

<?php
  }else{
    header ("Location: providers.php");
  }
?>