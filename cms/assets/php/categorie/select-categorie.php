<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    

    function categoryTree($parent_id = 0, $sub_mark = ''){
        global $conexao;
        $query = $conexao->query("SELECT * FROM tb03_categorie WHERE tb03_sub = $parent_id ORDER BY tb03_nome ASC");
        if($query->num_rows>0) {           
            while ($linha = $query->fetch_assoc()){                
                echo "<tr>";
                    echo "<td>";
                    echo  $sub_mark.$linha['tb03_nome'];
                    echo "</td>";
                    echo "<td>";  
                    echo    "<button href = 'javascript:func()'onclick='editarCategorie(".$linha["tb03_id"].")' class='btn btn-success' style='margin:2px;' id='".$linha["tb03_id"]."'
                            data-id='".$linha["tb03_id"]."'
                            data-nome='".$linha["tb03_nome"]."'> Editar </a></button>";
                    echo    "<button href = 'javascript:func()'onclick='deleteCategorie(".$linha["tb03_id"].")' class='btn btn-danger' style='margin:2px;'> Excluir </a></button>";
                    echo "</td>";
                echo "</tr>";  
                categoryTree($linha['tb03_id'], $sub_mark.'-');

            }           
        }
    }
    echo    "<div class='table-responsive'>";
    // echo        "<button href = 'javascript:func()'onclick='editarCategorie()' class='btn btn-success' style='margin:2px;'> Editar </a></button>";
    // echo        "<button class='btn btn-danger' style='margin:2px;'> Excluir </a></button>";
    echo        "<table class='table mb-0'>
                    <thead class='bg-light'>
                        <tr>
                        <th scope='col' class='border-0'>Categoria</th>
                        <th scope='col' class='border-0'>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>";
                        categoryTree();
    echo            "</tbody>
                </table>
            </div>";

?>