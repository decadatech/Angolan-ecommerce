<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    

    function categoryTree($parent_id = 0, $sub_mark = ''){
        global $conexao;
        $query = "SELECT * FROM tb03_categorie WHERE tb03_sub = $parent_id ORDER BY tb03_nome ASC";
        $result = $conexao->query($query);

        if($result->num_rows>0) { 
            while ($linha = $result->fetch_assoc()){    
                echo "<option class='form-control' value='".$linha['tb03_id']."'>".$sub_mark.$linha['tb03_nome']."</option>";
                categoryTree($linha['tb03_id'], $sub_mark.'-');
            }
        }
    }

    echo "<select class='form-control' name='categorie' id='categorie'>";
    echo    '<option class="form-control" value="0">Sem pai</option>';
            categoryTree();
    echo"</select>";

?>