<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb01_login` WHERE 1";
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
            if($_SESSION["nome"] != $linha["tb01_usuario"]){         
                echo "<tr>";
                    echo "<td>".$linha["tb01_usuario"]."</td>";
                    echo "<td>"; 
                    if($linha["tb01_ativo"] == 0){
                        echo    "<button href = 'javascript:func()'onclick='confirmarDarUser(".$linha["tb01_id"].")' class='btn btn-success' style='margin:2px;'> Dar permissão </a></button>";
                    }else{
                        echo    "<button href = 'javascript:func()'onclick='confirmarNegarUser(".$linha["tb01_id"].")' class='btn btn-warning' style='margin:2px;'> Negar permissão </a></button>";
                    }
                    echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoUser(".$linha["tb01_id"].")' class='btn btn-danger' style='margin:2px;'> Excluir </a></button>";
                    echo "</td>";
                echo "</tr>";  
            }
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<h2> Não há contatos por enquanto... </h2>";
    }        


?>