<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";

    $id = $_POST["id"];

    $query = "SELECT * FROM tb10_providers_products WHERE tb10_id_fornecedor = '".$id."' ORDER BY tb10_fruta ASC";
    $result = $conexao->query($query);

    if($result->num_rows>0) { 
        echo "<div class='form-group'>
                <div class='row'>
                    <div class='col-md-6'>
                        <select class='form-control' name='provider-product[]' id='provider-product[]'>";

        while ($linha = $result->fetch_assoc()){    
            echo "          <option class='form-control' value='".$linha['tb10_id']."'>".$linha['tb10_fruta']."</option>";
        }
        echo"           </select>
                    </div>
                </div>
            </div>";

    }  
?>