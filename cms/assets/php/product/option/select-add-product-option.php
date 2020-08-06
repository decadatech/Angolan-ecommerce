<?php
    include_once "../../login/verificado-login-for-php.php";
    include_once "../../../../../assets/php/conexao.php";
    
    $query = "SELECT * FROM `tb06_options` WHERE 1";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        while ($linha = $result->fetch_assoc()){  
            echo '<div class="form-group">
                    <label for="option['.$linha['tb06_id'].']">'.$linha['tb06_nome'].' (Opcional)</label>
                    <input type="text" class="form-control" id="option['.$linha['tb06_id'].']" name="option['.$linha['tb06_id'].']" />
                 </div>  ';                 
        } 
    }else {

    }
?>
