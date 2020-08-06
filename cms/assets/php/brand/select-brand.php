<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb04_brand` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                    <thead class='bg-light'>
                        <tr>
                        <th scope='col' class='border-0'>Foto</th>
                        <th scope='col' class='border-0'>Ações</th>                      
                        </tr>
                    </thead>
                    <tbody>";

        while ($linha = $result->fetch_assoc()){                
            echo "<tr>";
                echo "<td><img src='../assets/images/brands/".$linha["tb04_imagem"]."' style='max-width: 45%;max-height: 300px;width: auto;height: auto;'></td>";
                echo "<td>";     
                echo    "<button href = 'javascript:func()'onclick='editarBrand(".$linha["tb04_id"].")' class='btn btn-success' style='margin:2px;' id='".$linha["tb04_id"]."'
                         data-id='".$linha["tb04_id"]."'
                         data-nome='".$linha["tb04_nome"]."'> Editar </a></button>";
                echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoBrand(".$linha["tb04_id"].")' class='btn btn-danger' style='margin:2px;'> Excluir </a></button>";
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<br/><h5>Nenhuma marca inserida</h5>";
    }        


?>