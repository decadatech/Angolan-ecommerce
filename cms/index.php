<?php
  include_once "../assets/php/conexao.php";
  include_once "assets/php/login/verificado-login.php";

  if(!empty($_GET['f'])){
    $filtro = (int)($_GET['f']); 
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
    <div class=" border-right" id="sidebar-wrapper">
      <div style="display: flex; justify-content: center; align-items: center; padding: 30px auto; margin: 15px auto;">
        <h3>Páginas</h3>
      </div>
      <div class="list-group list-group-flush">
        <a style="background-color: #242424; color: white" href="index.php" class="list-group-item list-group-item-action">
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
        <a href="providers.php" class="list-group-item list-group-item-action">
          FORNECEDORES
        </a> 
        <a href="user.php" class="list-group-item list-group-item-action">
          USUÁRIO
        </a>
        <!-- <a href="plans.php" class="list-group-item list-group-item-action ">
          PLANOS
        </a>
        <a href="services.php" class="list-group-item list-group-item-action ">
          SERVIÇOS
        </a>
        <a href="about.php" class="list-group-item list-group-item-action ">
          SOBRE NÓS
        </a>
        <a href="work.php" class="list-group-item list-group-item-action ">
          TRABALHE CONOSCO
        </a>
        <a href="contact.php" class="list-group-item list-group-item-action ">
          CONTATO
        </a>
        <a href="user.php" class="list-group-item list-group-item-action ">
          USUÁRIOS
        </a>         -->
      </div>
    </div>
    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light  border-bottom">
        <button style="margin: 2px" class="btn btn-secondary" id="menu-toggle"> <span class="navbar-toggler-icon"></span> </button>
        <a style="margin: 2px" href="assets/php/login/logout.php" class="btn btn-danger"> Sair </a>
      </nav>
      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <!-- <div class="container">
          <a href="testimonial.php" style="margin: 0 0 10px;" class="btn btn-success"> Depoimentos </a>
        </div> -->
      </div>

      <div class="container-fluid" style="padding: 20px; width: 100%; background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">
        <div class="container">
          <h2> Compras já efetuadas</h2>  
          <label for="filtro">Filtro de status de compra:</label>
          <select id="filtro">
            <option value="0">Todos</option>
            <option value="1" <?php if(!empty($filtro) && $filtro == 1){ echo "selected"; } ?>>Aprovados</option>
            <option value="2" <?php if(!empty($filtro) && $filtro == 2){ echo "selected"; } ?>>Pendentes</option>
            <option value="3" <?php if(!empty($filtro) && $filtro == 3){ echo "selected"; } ?>>Cancelados</option>
          </select>         
          <div class="ajax-reponse-select-purchase"></div>
        </div>
      </div>     

  </div>  

  <div class="modal fade" id="ModalViewProduct" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Produtos comprados</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="all-products">                    
            </div>
            <div class="modal-footer">                         
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="ModalViewClient" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">                
                    <div class="form-group col-md-4">
                        <label for="view-phone"><b>Telefone</b></label>
                        <p id="view-phone"></p>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="view-email"><b>E-mail</b></label>
                        <p id="view-email"></p>
                    </div>
                </div>    
                <div class="form-row">                                
                    <div class="form-group col-md-4">
                        <label for="view-cpf"><b>CPF</b></label>
                        <p id="view-cpf"></p>
                    </div>   
                    <div class="form-group col-md-4">
                        <label for="view-cep"><b>CEP</b></label>
                        <p id="view-cep"></p>
                    </div>                        
                </div>      
                <div class="form-row">                                
                    <div class="form-group col-md-6">
                        <label for="view-address"><b>Endereço</b></label>
                        <p id="view-address"></p>
                    </div>   
                    <div class="form-group col-md-4">
                        <label for="view-neighborhood"><b>Bairro</b></label>
                        <p id="view-neighborhood"></p>
                    </div>                        
                </div>      
                <div class="form-row">                                
                    <div class="form-group col-md-6">
                        <label for="view-city"><b>Cidade</b></label>
                        <p id="view-city"></p>
                    </div>                  
                </div>                                                             
            </div>
            <div class="modal-footer">                         
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="ModalViewPurchase" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="view-id" />
                <div class="form-row">                
                    <div class="form-group col-md-4">
                        <label for="view-status"><b>Status</b></label>
                        <p id="view-status"></p>
                    </div>                    
                </div>    
                <div class="form-row">                                
                    <div class="form-group col-md-4">
                        <label for="view-precoProduto"><b>Valor dos Produtos</b></label>
                        <p id="view-precoProduto"></p>
                    </div>                                       
                </div>      
                <div class="form-row">                                
                    <div class="form-group col-md-6">
                        <label for="view-tipoCompra"><b>Método de Pagamento</b></label>
                        <p id="view-tipoCompra"></p>
                    </div>                                  
                </div>                                                                          
            </div>
            <div class="modal-footer">        
                <button type="button" id="confirmPag" class="btn btn-success close-modal" data-dismiss="modal" onclick="confirmPag()">Confirmar pagamento</button>                 
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="ModalViewDelivery" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="view-idCorreio" />
                <div class="form-row">                
                    <div class="form-group col-md-4">
                        <label for="view-statusFrete"><b>Status de envio</b></label>
                        <p id="view-statusFrete"></p>
                    </div>
                     <div class="form-group col-md-4">
                        <label for="view-tipoFrete"><b>Tipo de frete</b></label>
                        <p id="view-tipoFrete"></p>
                    </div>       
                </div>  
                <div class="form-row">                
                    <div class="form-group col-md-4">
                        <label for="view-precoFrete"><b>Valor de envio</b></label>
                        <p id="view-precoFrete"></p>
                    </div>                         
                </div>                                                 
            </div>
            <div class="modal-footer">        
                <button type="button" id="confirmEnvio" class="btn btn-success close-modal" data-dismiss="modal" onclick="statusCorreio(1)">Confirmar envio</button>                 
                <button type="button" id="confirmEntrega" class="btn btn-success close-modal" data-dismiss="modal" onclick="statusCorreio(2)">Confirmar entrega</button>                 
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
  <!-- JQUERY MASK -->
  <script src="../assets/libs/jquery.mask.js"></script>
  <!-- FEATHER ICONS -->
  <script src="https://unpkg.com/feather-icons"></script>
  <!-- INDEX JS -->
  <script src="assets/js/homeCMS.js"></script>

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