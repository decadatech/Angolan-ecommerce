<?php
    include_once "../../login/verificado-login-for-php.php";
    include_once "../../../../../assets/php/conexao.php";

    $opcao = false;
    
    $query = "SELECT * FROM `tb06_options` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                    <thead class='bg-light'>
                        <tr>
                        <th scope='col' class='border-0'>Nome da opção</th>
                        <th scope='col' class='border-0'>Ações</th>                      
                        </tr>
                    </thead>
                    <tbody>";

        while ($linha = $result->fetch_assoc()){   
            
            $queryOpcao = "SELECT `tb07_id` FROM `tb07_options_products` WHERE `tb07_id_opcao` = ".$linha['tb06_id'];
            $resultOpcao = $conexao->query($queryOpcao);
            if($resultOpcao->num_rows>0) { 
                $opcao = true;
                
            }  

            echo "<tr>";
                echo "<td>".$linha["tb06_nome"]."</td>";
                echo "<td>";  
                echo    "<button href = 'javascript:func()'onclick='editarOptionProduct(".$linha["tb06_id"].")' class='btn btn-success' style='margin:2px;' id='".$linha["tb06_id"]."'
                         data-id='".$linha["tb06_id"]."'
                         data-nome='".$linha["tb06_nome"]."'> Editar </a></button>";
                echo    "<button class='btn btn-danger' style='margin:2px;'";
                if($opcao == 1){
                    echo    "disabled";
                }else{
                    echo    "href = 'javascript:func()'onclick='confirmarExclusaoOptionProduct(".$linha["tb06_id"].")'";
                }
                echo "> Excluir </a></button>";
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<br/><h5>Nenhuma opção inserida</h5>";
    }        


?>