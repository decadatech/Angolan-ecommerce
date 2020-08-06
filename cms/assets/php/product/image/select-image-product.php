<?php
    include_once "../../login/verificado-login-for-php.php";
    include_once "../../../../../assets/php/conexao.php";
    
    $id = $_POST['id'];

    $query = "SELECT * FROM `tb08_image_products` WHERE `tb08_id_produto` = $id";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){  
            echo '<div style="padding: 10px; display: flex; flex-direction: column;">
                    <input type="hidden" id="photo[]" name="photo[]" value="'.$linha['tb08_imagem'].'">
                    <img style="width: 150px;" src="../assets/images/products/'.$linha['tb08_imagem'].'" class="img-thumbnail" border="0" />
                    <br />';
            echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoImagem(".$linha["tb08_id"].")' class='btn btn-danger'> Excluir Imagem</a></button>
                 </div>";        
        } 
    }else {
        echo "Sem imagem";
    }
?>
