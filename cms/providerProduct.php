<?php
  include_once "assets/php/login/verificado-login.php";
  include_once "../assets/php/conexao.php";

  if(!empty($_GET['id'])){
    $id = (int)($_GET['id']); 
    $query = "SELECT * FROM `tb09_providers` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
      while ($linha = $result->fetch_assoc()){     
        $fornecedor = $linha["tb09_nome"];
      }
    }

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

      <div class="container-fluid" style="padding: 20px; width: 100%; display: flex; justify-content: center; align-items: center;">
        <div class="container">                                                  
          <button onclick="window.location.href = 'harvest.php?id='+<?php echo $id ?>" type="submit" class="btn btn-primary">Adicionar Próxima Colheita</button>
        </div>
      </div>

      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <h2>Cadastrar Produto</h2>        
        </div>
      </div>

      <div class="container-fluid" style="padding: 20px; width: 100%; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <form method="POST" id="formProviderProduct">                  
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="fruta">Nome Fruta</label>
                  <input type="text" name="fruta" id="fruta" class="form-control" required>
                </div>              
                <div class="col-md-6">
                  <label for="fornecedor">Fornecedor</label>
                  <input type="text" name="fornecedor" id="fornecedor" class="form-control" value="<?php echo $fornecedor; ?>" required readonly>
                  <input type="hidden" name="idFornecedor" id="idFornecedor" class="form-control" value="<?php echo $id; ?>" required readonly>
                </div>               
              </div>   
            </div>           
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="estoque">Estoque</label>
                  <input type="number" name="estoque" id="estoque" class="form-control" required>
                </div>
                <div class="col-md-2">
                  <label for="unidade">Unidade</label>
                  <select name="unidade" id="unidade" class="form-control">
                    <option value="0">KG</option>
                    <option value="1">UN</option>
                  </select>            
                </div> 
                <div class="col-md-4">
                  <label for="valor">Valor por <span id="valorUnidade">KG</span></label>
                  <input type="text" name="valor" id="valor" class="form-control" required>
                </div>               
              </div>   
            </div>   
            <button type="submit" class="btn btn-primary">Adicionar</button>
          </form>
        </div>
      </div>    

      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <h2>Produtos</h2>  
          <div class="ajax-reponse-select-provider-product"></div>
        </div>
      </div>

  </div>

  <div id="addProviderProductModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adição feita!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
            <p>Seu produto foi inserido com sucesso.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>    

  <div id="editConfirmProviderProductModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edição feita!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
            <p>Seu produto foi editado com sucesso.</p>
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
              <form method="POST" id="FormModalProviderProduct">
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
  <script src="assets/js/providerProductCMS.js"></script>

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