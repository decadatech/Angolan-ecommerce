<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";
    

    $query = "SELECT * FROM tb04_brand WHERE 1 ORDER BY tb04_nome ASC";
    $result = $conexao->query($query);


    if($result->num_rows>0) { 
        echo "<select class='form-control' name='brand' id='brand'>";

        while ($linha = $result->fetch_assoc()){    
            echo "<option class='form-control' value='".$linha['tb04_id']."'>".$linha['tb04_nome']."</option>";
        }
        echo"</select>";

    }

?>