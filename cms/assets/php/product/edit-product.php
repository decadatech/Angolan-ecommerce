<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";

    $codigo = $_POST['id'];
    $produto =  mysqli_real_escape_string($conexao, trim($_POST["edit-nameProduct"]));
    $categoria =  mysqli_real_escape_string($conexao, trim($_POST["categorie"]));
    $marca =  mysqli_real_escape_string($conexao, trim($_POST["brand"]));
    $descricao =  mysqli_real_escape_string($conexao, trim($_POST["edit-description"]));
    $estoque =  mysqli_real_escape_string($conexao, trim($_POST["edit-stock"]));
    $precode =  isset($_POST["edit-priceFrom"]) ? mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["edit-priceFrom"]))) : NULL;
    $precopara =  mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["edit-priceFor"])));

    $novo =  isset($_POST["edit-new"]) ? 1 : 0;
    $oportunidade =  isset($_POST["edit-oportunity"]) ? 1 : 0;
    $destaque =  isset($_POST["edit-spotlight"]) ? 1 : 0;

    // $peso =  mysqli_real_escape_string($conexao, trim($_POST["edit-weight"]));
    // $largura =  mysqli_real_escape_string($conexao, trim($_POST["edit-width"]));
    // $comprimento =  mysqli_real_escape_string($conexao, trim($_POST["edit-length"]));
    // $diametro =  mysqli_real_escape_string($conexao, trim($_POST["edit-diameter"]));
    // $altura =  mysqli_real_escape_string($conexao, trim($_POST["edit-height"]));

    $option = $_POST["option"];

    $images = (!empty($_FILES['photo']))?$_FILES['photo']:array();

    $option_selected = array();
    foreach($option as $optk => $opt){
        if(!empty($opt)){
            $option_selected[$optk] = $opt;
        }
    }

    $option = implode(",",array_keys($option_selected));

    //$queryinsere = "UPDATE `tb05_products` SET `tb05_nome`='".$produto."',`tb05_descricao`='".$descricao."',`tb05_estoque`='".$estoque."',`tb05_preco`='".$precode."',`tb05_preco_from`='".$precopara."',`tb05_opcoes`='".$option."',`tb05_peso`='".$peso."',`tb05_largura`='".$largura."',`tb05_altura`='".$altura."',`tb05_comprimento`='".$comprimento."',`tb05_diametro`='".$diametro."',`tb05_id_categoria`='".$categoria."',`tb05_id_marca`='".$marca."' WHERE `tb05_id`=$codigo";
    $queryinsere = "UPDATE `tb05_products` SET `tb05_nome`='".$produto."',`tb05_descricao`='".$descricao."',`tb05_estoque`='".$estoque."',`tb05_preco_antigo`='".$precode."',`tb05_preco_real`='".$precopara."',`tb05_opcoes`='".$option."',`tb05_peso`=null,`tb05_largura`=null,`tb05_altura`=null,`tb05_comprimento`=null,`tb05_diametro`=null,`tb05_novo`='".$novo."',`tb05_oportunidade`='".$oportunidade."',`tb05_destaque`='".$destaque."',`tb05_id_categoria`='".$categoria."',`tb05_id_marca`='".$marca."' WHERE `tb05_id`=$codigo";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

    if($resultadoinsere){
        $querydelete ="DELETE FROM tb07_options_products WHERE tb07_id_produto=$codigo";
        $resultadodelete = $conexao->query($querydelete);	

        foreach($option_selected as $optk => $opt){
            $queryOption = "INSERT INTO `tb07_options_products`(`tb07_valor`, `tb07_id_produto`, `tb07_id_opcao`) VALUES ('".$opt."', '".$codigo."', '".$optk."')";
            $resultadoOption = mysqli_query($conexao, $queryOption);
        }
        if(!empty($_FILES['photo'])){
            for($i=0;$i<count($images['name']);$i++){
                $tmp_name = $images['tmp_name'][$i];
                $type = $images['type'][$i];

                addProductImage($codigo, $tmp_name, $type);
            }
        }
    }

        function addProductImage($idProduto, $tmp_name, $type){
            global $conexao;
            switch($type) {
                case 'image/jpg':
                case 'image/jpeg':
                    $o_img = imagecreatefromjpeg($tmp_name);
                    break;
                case 'image/png':
                    $o_img = imagecreatefrompng($tmp_name);
                    break;
            }

            if(!empty($o_img)){
                $width = 334;
                $height = 500;
                $ratio = $width / $height;
    
                list($o_width, $o_height) = getimagesize($tmp_name);
    
                $o_ratio = $o_width / $o_height;
    
                if($ratio > $o_ratio) {
                    $img_w = $height * $o_ratio;
                    $img_h = $height;
                } else {
                    $img_h = $width / $o_ratio;
                    $img_w = $width;
                }
    
                if($img_w < $width) {
                    $img_w = $width;
                    $img_h = $img_w / $o_ratio;
                }
                if($img_h < $height) {
                    $img_h = $height;
                    $img_w = $img_h * $o_ratio;
                }
    
                $px = 0;
                $py = 0;
    
                if($img_w > $width) {
                    $px = ($img_w - $width) / 2;
                }
    
                if($img_h > $height) {
                    $py = ($img_h - $height) / 2;
                }
    
    
                $img = imagecreatetruecolor( $width, $height );
                imagecopyresampled($img, $o_img, -$px, -$py, 0, 0, $img_w, $img_h, $o_width, $o_height);
    
                $filename = md5(time().rand(0,999).rand(0,999)).'.jpg';
                imagejpeg($img, '../../../../assets/images/products/'.$filename);

                $queryImage = "INSERT INTO `tb08_image_products`(`tb08_imagem`,  `tb08_id_produto`) VALUES ('".$filename."', '".$idProduto."')";
                echo $queryImage;
                $resultadoImage = mysqli_query($conexao, $queryImage);
            }
        }

    
    
	
?>