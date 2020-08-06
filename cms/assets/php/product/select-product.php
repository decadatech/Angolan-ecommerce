<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb05_products` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                    <thead class='bg-light'>
                        <tr>
                        <th scope='col' class='border-0'>Categoria</th>
                        <th scope='col' class='border-0'>Nome</th>
                        <th scope='col' class='border-0'>Estoque</th>
                        <th scope='col' class='border-0'>Preço</th>
                        <th scope='col' class='border-0'>Ações</th>                      
                        </tr>
                    </thead>
                    <tbody>";

        while ($linha = $result->fetch_assoc()){      
            
            $option = explode(",", $linha['tb05_opcoes']);

            $option_selected = array();
            foreach($option as $optk => $opt){
                if(!empty($opt)){
                    $option_selected[$optk] = $opt;
                }
            }
            
            $queryCategoria = "SELECT * FROM `tb03_categorie` WHERE `tb03_id` = ".$linha['tb05_id_categoria'];
            $resultCategoria = $conexao->query($queryCategoria);
            if($resultCategoria->num_rows>0) { 
                while ($linhaCategoria = $resultCategoria->fetch_assoc()){          
                    $nomeCategoria = $linhaCategoria['tb03_nome'];
                }
            }

            $queryMarca = "SELECT `tb04_nome` FROM `tb04_brand` WHERE `tb04_id` = ".$linha['tb05_id_marca'];
            $resultMarca = $conexao->query($queryMarca);
            if($resultMarca->num_rows>0) { 
                while ($linhaMarca = $resultMarca->fetch_assoc()){          
                    $nomeMarca = $linhaMarca['tb04_nome'];
                }
            }           

           
                
            if($linha['tb05_estoque'] == 0){
                echo "<tr style='background-color:#f55b66'>";
            }else{
                echo "<tr>";
            }
                echo "<td>".$nomeCategoria."</td>";
                echo "<td>".$linha["tb05_nome"]."</br>";
                echo "<small>".$nomeMarca."</small></td>";
                echo "<td>".$linha["tb05_estoque"]."</td>";
                echo "<td>";
                if($linha['tb05_preco_antigo'] != 0){
                    echo "<small><strike>R$ ".number_format($linha['tb05_preco_antigo'], 2, ',', '')."</small></strike><br/>";
                }
                echo "R$ ".number_format($linha['tb05_preco_real'], 2, ',', '')."</td>";

                echo "<td>";  
                echo    "<button href = 'javascript:func()'onclick='editarAbout(".$linha["tb05_id"].")' class='btn btn-success' style='margin:2px;' id='".$linha["tb05_id"]."'
                         data-categoria='".$linha["tb05_id_categoria"]."'
                         data-marca='".$linha["tb05_id_marca"]."'
                         data-descricao='".$linha["tb05_descricao"]."'
                         data-estoque='".$linha["tb05_estoque"]."'
                         data-precode='".$linha["tb05_preco_antigo"]."'
                         data-precopara='".$linha["tb05_preco_real"]."'
                         ";
                         foreach($option_selected as $optk => $opt){
                            $queryOption = "SELECT `tb07_valor` FROM `tb07_options_products` WHERE `tb07_id_opcao` = ".$opt;
                            $resultOption = $conexao->query($queryOption);
                            if($resultOption->num_rows>0) { 
                                while ($linhaOption = $resultOption->fetch_assoc()){          
                                    echo "data-option[".$opt."]='".$linhaOption['tb07_valor']."'";
                                }
                            }
                        }                        
                        echo"
                         data-options='".$linha["tb05_opcoes"]."'
                         data-peso='".$linha["tb05_peso"]."'
                         data-largura='".$linha["tb05_largura"]."'
                         data-altura='".$linha["tb05_altura"]."'
                         data-comprimento='".$linha["tb05_comprimento"]."'
                         data-diametro='".$linha["tb05_diametro"]."'                         
                         data-id='".$linha["tb05_id"]."'
                         data-nome='".$linha["tb05_nome"]."'> Editar </a></button>";
                         if($linha['tb05_estoque'] == 0){
                            echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoProduct(".$linha["tb05_id"].")' class='btn btn-danger' style='margin:2px;' disabled> Excluir </a></button>";

                         }else{
                            echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoProduct(".$linha["tb05_id"].")' class='btn btn-danger' style='margin:2px;'> Excluir </a></button>";
                         }
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<br/><h5>Nenhuma produto inserido</h5>";
    }        


?>