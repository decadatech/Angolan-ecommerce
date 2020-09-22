<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb10_providers_products` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                    <thead class='bg-light'>
                        <tr>
                        <th scope='col' class='border-0'>Nome</th>                        
                        <th scope='col' class='border-0'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>";

        while ($linha = $result->fetch_assoc()){     
            echo "<tr>";
                echo "<td>".$linha["tb10_fruta"]."</td>";               
                echo "<td>";       
                echo    "<button href = 'javascript:func()'onclick='editProviderProduct(".$linha["tb10_id"].")' class='btn btn-success' style='margin:2px;' id=".$linha["tb10_id"]."
                            data-fruta='".$linha["tb10_fruta"]."'
                            data-estoque='".$linha["tb10_estoque"]."'
                            data-unidade='".$linha["tb10_unidade"]."'
                            data-valor='".$linha["tb10_valor"]."'
                            data-id='".$linha["tb10_id"]."'
                            > Editar </a></button>";
                echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoProvider(".$linha["tb10_id"].")' class='btn btn-danger' style='margin:2px;'> Excluir </a></button>";
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<h4> Não há produtos por enquanto... </h4>";
    }        


?>