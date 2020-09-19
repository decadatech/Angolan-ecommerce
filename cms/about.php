<?php
  include_once "../assets/php/conexao.php";
  include_once "assets/php/login/verificado-login.php";
  date_default_timezone_set('America/Sao_Paulo');

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
        <a href="index.php" class="list-group-item list-group-item-action">
          HOME
        </a>
        <a style="background-color: #242424; color: white" href="about.php" class="list-group-item list-group-item-action">
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
        <a style="margin: 2px" href="assets/php/logout.php" class="btn btn-danger"> Sair </a>
        <!-- <a style="margin: 2px"><?php echo $_SESSION["nome"] ?></a> -->
      </nav>
      <div class="container-fluid" style="padding: 20px; width: 100%;  background-color: #f5f5f5; display: flex; justify-content: center; align-items: center;">

        <div class="container">        

          <form method="POST" id="formAbout">                    
              <div class="form-group">
                  <label for="cargo">Titulo*</label>
                  <input type="text" class="form-control" id="titulo" name="titulo" required />
              </div>
              <div class="form-group">
                  <label for="descricao">Descrição*</label>
                  <textarea class="form-control" id="text" rows="3" id="descricao" name="descricao" required></textarea>
              </div>            
              <label>Escolha o ícone*</label>
              <div class="custom-control custom-radio col-md-3">
                <input type="radio" class="custom-control-input crosshair" id="customControlValidation2" value="crosshair" name="icon" required>
                <label class="custom-control-label" for="customControlValidation2" ><i data-feather="crosshair" color= '#06994b'></i></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input anchor" id="customControlValidation3" value="anchor" name="icon" required>
                <label class="custom-control-label" for="customControlValidation3" ><i data-feather='anchor' color= '#06994b'></i></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input activity" id="customControlValidation4" value="activity" name="icon" required>
                <label class="custom-control-label" for="customControlValidation4" ><i data-feather='activity' color= '#06994b'></i></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input bar-chart" id="customControlValidation5" value="bar-chart" name="icon" required>
                <label class="custom-control-label" for="customControlValidation5" ><i data-feather='bar-chart' color= '#06994b'></i></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input bookmark" id="customControlValidation6" value="bookmark" name="icon" required>
                <label class="custom-control-label" for="customControlValidation6" ><i data-feather='bookmark' color= '#06994b'></i></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input coffee" id="customControlValidation7" value="coffee" name="icon" required>
                <label class="custom-control-label" for="customControlValidation7" ><i data-feather='coffee' color= '#06994b'></i></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input rss" id="customControlValidation8" value="rss" name="icon" required>
                <label class="custom-control-label" for="customControlValidation8" ><i data-feather='rss' color= '#06994b'></i></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input box" id="customControlValidation9" value="box" name="icon" required>
                <label class="custom-control-label" for="customControlValidation9" ><i data-feather='box' color= '#06994b'></i></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input inbox" id="customControlValidation10" value="inbox" name="icon" required>
                <label class="custom-control-label" for="customControlValidation10" ><i data-feather='inbox' color= '#06994b'></i></label>
              </div>
              <div class="custom-control custom-radio mb-3">
                <input type="radio" class="custom-control-input message-square" id="customControlValidation11" value="message-square" name="icon" required>
                <label class="custom-control-label" for="customControlValidation11"><i data-feather='message-square' color= '#06994b'></i></label>
                <div class="invalid-feedback">Selecione uma opção</div>                                                                 
              </div>                        
                              
              <button type="submit" class="btn btn-primary">Adicionar</button>

          </form>

        </div>
      </div>
      <div class="container-fluid" style="padding: 20px; width: 100%; display: flex; justify-content: center; align-items: center;">

        <div class="container">
            <h2> Sobre já inserido</h2>  
            <div class="ajax-reponse-select-about"></div>
        </div>
      </div>
    </div>

    <!-- MODAL ALERT -->
    <div id="addAboutModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Adição feita!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <p>Seu sobre foi inserida com sucesso.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>    

    <!-- MODAL ALERT -->
    <div id="editConfirmAboutModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edição feita!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <p>Seu sobre foi editado com sucesso.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div> 

    <div class="modal fade" id="editAboutModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Editar Sobre</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="FormModalWork">
                    <div class="form-row">                                
                        <div class="form-group col-md-12">
                            <label for="edit-name">Título*</label>
                            <input type="text" class="form-control" name="edit-titulo" id="edit-titulo" placeholder="Nome do produto" required>
                        </div>
                    </div>   
                    <div class="form-row">                                
                        <div class="form-group col-md-12">
                            <label for="edit-name">Descrição*</label>
                            <textarea type="text" class="form-control" name="edit-descricao" rows="5" id="edit-descricao" placeholder="Nome do produto" required> </textarea>
                        </div>
                    </div>  
                    <label>Escolha o ícone*</label>
                    <div class="custom-control custom-radio col-md-3">
                        <input type="radio" class="custom-control-input crosshair" id="ModalcustomControlValidation2" value="crosshair" name="edit-icon" required>
                        <label class="custom-control-label" for="ModalcustomControlValidation2" ><i data-feather="crosshair" color= '#06994b'></i></label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input anchor" id="ModalcustomControlValidation3" value="anchor" name="edit-icon" required>
                        <label class="custom-control-label" for="ModalcustomControlValidation3" ><i data-feather='anchor' color= '#06994b'></i></label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input activity" id="ModalcustomControlValidation4" value="activity" name="edit-icon" required>
                        <label class="custom-control-label" for="ModalcustomControlValidation4" ><i data-feather='activity' color= '#06994b'></i></label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input bar-chart" id="ModalcustomControlValidation5" value="bar-chart" name="edit-icon" required>
                        <label class="custom-control-label" for="ModalcustomControlValidation5" ><i data-feather='bar-chart' color= '#06994b'></i></label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input bookmark" id="ModalcustomControlValidation6" value="bookmark" name="edit-icon" required>
                        <label class="custom-control-label" for="ModalcustomControlValidation6" ><i data-feather='bookmark' color= '#06994b'></i></label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input coffee" id="ModalcustomControlValidation7" value="coffee" name="edit-icon" required>
                        <label class="custom-control-label" for="ModalcustomControlValidation7" ><i data-feather='coffee' color= '#06994b'></i></label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input rss" id="ModalcustomControlValidation8" value="rss" name="edit-icon" required>
                        <label class="custom-control-label" for="ModalcustomControlValidation8" ><i data-feather='rss' color= '#06994b'></i></label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input box" id="ModalcustomControlValidation9" value="box" name="edit-icon" required>
                        <label class="custom-control-label" for="ModalcustomControlValidation9" ><i data-feather='box' color= '#06994b'></i></label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input inbox" id="ModalcustomControlValidation10" value="inbox" name="edit-icon" required>
                        <label class="custom-control-label" for="ModalcustomControlValidation10" ><i data-feather='inbox' color= '#06994b'></i></label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input type="radio" class="custom-control-input message-square" id="ModalcustomControlValidation11" value="message-square" name="edit-icon" required>
                        <label class="custom-control-label" for="ModalcustomControlValidation11"><i data-feather='message-square' color= '#06994b'></i></label>
                        <div class="invalid-feedback">Selecione uma opção</div>                                                                 
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
    <!-- Bootstrap JS CDN -->
    <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <!-- FEATHER ICONS -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- ABOUT JS -->
    <script src="assets/js/aboutCMS.js"></script>

    <script>
        feather.replace()

        $(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });     
        });
    </script>

</body>

</html>