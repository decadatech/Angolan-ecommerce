<?php
    include_once "../../../../assets/php/conexao.php";
    include_once "../login/verificado-login-for-php.php";
    
    $query = "SELECT * FROM `tb02_about` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 

        echo    "<div class='table-responsive'>
                    <table class='table mb-0'>
                    <thead class='bg-light'>
                        <tr>
                        <th scope='col' class='border-0'>Título</th>
                        <th scope='col' class='border-0'>Descrição</th>     
                        <th scope='col' class='border-0'>Ações</th>                      
                        </tr>
                    </thead>
                    <tbody>";

        while ($linha = $result->fetch_assoc()){                
            echo "<tr>";
                echo "<td>".$linha["tb02_titulo"]."</td>";
                echo "<td>".$linha["tb02_descricao"]."</td>";
                echo "<td>";  
                echo    "<button href = 'javascript:func()'onclick='editarAbout(".$linha["tb02_id"].")' class='btn btn-success' style='margin:2px;' id='".$linha["tb02_id"]."'
                         data-id='".$linha["tb02_id"]."'
                         data-titulo='".$linha["tb02_titulo"]."'
                         data-icone='".$linha["tb02_icone"]."'
                         data-descricao='".$linha["tb02_descricao"]."'> Editar </a></button>";
                echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoAbout(".$linha["tb02_id"].")' class='btn btn-danger' style='margin:2px;'> Excluir </a></button>";
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<br/><h5>Nenhum sobre inserido</h5>";
    }        


?>