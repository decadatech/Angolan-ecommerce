<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb09_providers` WHERE 1";
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
                echo "<td>".$linha["tb09_nome"]."</td>";
                echo "<td>"; 
                echo    "<button href = 'javascript:func()'onclick='viewProvider(".$linha["tb09_id"].")' class='btn btn-primary' style='margin:2px;' id='".$linha["tb09_id"]."'
                            data-nome='".$linha["tb09_nome"]."'
                            data-telefone='".$linha["tb09_telefone"]."'
                            data-email='".$linha["tb09_email"]."'
                            data-fiscal='".$linha["tb09_numero_fiscal"]."'
                            data-cep='".$linha["tb09_cep"]."'
                            data-endereco='".$linha["tb09_endereco"]."'
                            data-numero='".$linha["tb09_numero"]."'
                            data-cidade='".$linha["tb09_cidade"]."'
                            data-complemento='".$linha["tb09_complemento"]."'
                            data-bairro='".$linha["tb09_bairro"]."'";
                        if(isset($linha["complemento"])){
                            echo "data-complemento='".$linha["tb09_complemento"]."'";
                        }
                echo "   > Visualizar </a></button>";
                if($linha["tb09_ativo"] == 0){
                    echo    "<button href = 'javascript:func()'onclick='confirmarDarProvider(".$linha["tb09_id"].")' class='btn btn-success' style='margin:2px;'> Dar permissão </a></button>";
                }else{
                    echo    "<button href = 'javascript:func()'onclick='confirmarNegarProvider(".$linha["tb09_id"].")' class='btn btn-warning' style='margin:2px;'> Negar permissão </a></button>";
                }                
                echo    "<button href = 'javascript:func()'onclick='confirmarExclusaoProvider(".$linha["tb09_id"].")' class='btn btn-danger' style='margin:2px;'> Excluir </a></button>";
                echo    "<button href = 'javascript:func()'onclick='viewProduct(".$linha["tb09_id"].")' class='btn btn-dark' style='margin:2px;'> Produtos </a></button>";
                echo "</td>";
            echo "</tr>";  
        }
        
        
        echo        "</tbody>
            </table>
    </div>";
        
    }else {
        echo "<h2> Não há fornecedores por enquanto... </h2>";
    }        


?>