<?php
    include_once "../login/verificado-login-for-php.php";
    include_once "../../../../assets/php/conexao.php";


    $produto =  mysqli_real_escape_string($conexao, trim($_POST["nameProduct"]));
    $categoria =  mysqli_real_escape_string($conexao, trim($_POST["categorie"]));
    $marca =  mysqli_real_escape_string($conexao, trim($_POST["brand"]));
    $descricao =  mysqli_real_escape_string($conexao, trim($_POST["description"]));
    $estoque =  mysqli_real_escape_string($conexao, trim($_POST["stock"]));
    $precode =  isset($_POST["priceFrom"]) ? mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["priceFrom"]))) : NULL;
    $precopara =  mysqli_real_escape_string($conexao, trim(str_replace(",",".", $_POST["priceFor"])));

    $novo =  isset($_POST["new"]) ? 1 : 0;
    $oportunidade =  isset($_POST["oportunity"]) ? 1 : 0;
    $destaque =  isset($_POST["spotlight"]) ? 1 : 0;

    // $peso =  mysqli_real_escape_string($conexao, trim($_POST["weight"]));
    // $largura =  mysqli_real_escape_string($conexao, trim($_POST["width"]));
    // $comprimento =  mysqli_real_escape_string($conexao, trim($_POST["length"]));
    // $diametro =  mysqli_real_escape_string($conexao, trim($_POST["diameter"]));
    // $altura =  mysqli_real_escape_string($conexao, trim($_POST["height"]));

    $option = $_POST["option"];

    $images = (!empty($_FILES['photo']))?$_FILES['photo']:array();

    $option_selected = array();
    foreach($option as $optk => $opt){
        if(!empty($opt)){
            $option_selected[$optk] = $opt;
        }
    }

    $option = implode(",",array_keys($option_selected));


    //$queryinsere = "INSERT INTO `tb05_products`(`tb05_nome`, `tb05_descricao`, `tb05_estoque`, `tb05_preco_real`, `tb05_preco_antigo`, `tb05_opcoes`, `tb05_peso`, `tb05_largura`, `tb05_altura`, `tb05_comprimento`, `tb05_diametro`, `tb05_novo`, `tb05_oportunidade`, `tb05_destaque`, `tb05_id_marca`, `tb05_id_categoria`, `tb05_id`) VALUES ('".$produto."','".$descricao."','".$estoque."','".$precofor."','".$precode."','".$option."','".$peso."','".$largura."','".$altura."','".$comprimento."','".$diametro."','".$categoria."','".$marca."')";
    $queryinsere = "INSERT INTO `tb05_products`(`tb05_nome`, `tb05_descricao`, `tb05_estoque`, `tb05_preco_real`, `tb05_preco_antigo`, `tb05_opcoes`, `tb05_peso`, `tb05_largura`, `tb05_altura`, `tb05_comprimento`, `tb05_diametro`, `tb05_novo`, `tb05_oportunidade`, `tb05_destaque`, `tb05_id_marca`, `tb05_id_categoria`) VALUES ('".$produto."','".$descricao."','".$estoque."','".$precopara."','".$precode."','".$option."',null,null,null,null,null,'".$novo."','".$oportunidade."','".$novo."','".$marca."','".$categoria."')";
    $resultadoinsere = mysqli_query($conexao, $queryinsere);

    if($resultadoinsere){
        $idProduto = mysqli_insert_id($conexao);
        foreach($option_selected as $optk => $opt){
            $queryOption = "INSERT INTO `tb07_options_products`(`tb07_valor`, `tb07_id_produto`, `tb07_id_opcao`) VALUES ('".$opt."', '".$idProduto."', '".$optk."')";
            $resultadoOption = mysqli_query($conexao, $queryOption);
        }
        if(isset($images['name'])){
            for($i=0;$i<count($images['name']);$i++){
                $tmp_name = $images['tmp_name'][$i];
                $type = $images['type'][$i];

                addProductImage($idProduto, $tmp_name, $type);
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
                $resultadoImage = mysqli_query($conexao, $queryImage);
            }
        }

    
    
	
?>