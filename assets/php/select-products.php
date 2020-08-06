<?php
    include_once "conexao.php";
    
    $query = "SELECT * FROM `tb05_products` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) {    
        while ($linha = $result->fetch_assoc()){       
            $queryProducts = "SELECT * FROM `tb08_image_products` WHERE `tb08_id_produto` = ".$linha["tb05_id"]." LIMIT 1";
            $resultProducts = $conexao->query($queryProducts);
        
            if($resultProducts->num_rows>0) {    
                while ($linhaProducts = $resultProducts->fetch_assoc()){   
                    $imagem = $linhaProducts["tb08_imagem"];
                }
            }
            echo    '<div class="item">
                        <h3>'.$linha["tb05_nome"].'<h3>
                        <a href="#">
                            <img src="assets/images/products/'.$imagem.'" alt="Abacaxi">
                        </a>
                        <h3>'.$linha["tb05_descricao"].'</h3>
                        <small><strike>'.$linha["tb05_preco_antigo"].' AKZ</small></strike>
                        <h4>'.$linha["tb05_preco_real"].' AKZ</h4>
                        <button class="more">Ver mais</button>
                    </div>';
        }      
        
    }else {
        echo "<br/><h5>Nenhuma Produto inserida</h5>";
    }        


?>


