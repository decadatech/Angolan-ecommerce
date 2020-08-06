$.ajax({
    url: 'assets/php/product/select-product.php',
    success: function(response) {
        $('.ajax-reponse-select-product').html(response);        
    },
});

$.ajax({
    url: 'assets/php/categorie/select-option-categorie-product.php',
    success: function(response) {
        $('.ajax-reponse-select-option-categorie-product').html(response);        
    },
});

$.ajax({
    url: 'assets/php/brand/select-option-brand.php',
    success: function(response) {
        $('.ajax-reponse-select-option-brand-product').html(response);        
    },
});

$.ajax({
    url: 'assets/php/product/option/select-add-product-option.php',
    success: function(response) {
        $('.ajax-reponse-select-option-add-product').html(response);        
    },
});

$("#more_fields").click(function() {
    event.preventDefault();
        var campos_novos = "<div class='row dep_fc'><div class='form-group col-md-6'><input type='file' class='form-control' id='photo[]' name='photo[]' accept='image/png, image/jpeg'></div></div>";
        $("#dep").append(campos_novos);
});

$("#less_fields").click(function() {
    event.preventDefault();
    $('#dep').children('div').last().remove();
});

$(document).ready(function() {     
    $('#priceFrom').mask('###0,00', {reverse: true});
    $('#priceFor').mask('###0,00', {reverse: true});
    $('#edit-priceFrom').mask('###0,00', {reverse: true});
    $('#edit-priceFor').mask('###0,00', {reverse: true});

    $('#weight').mask('#.##0,00', {reverse: true});
    $('#width').mask('#.##0,00', {reverse: true});
    $('#length').mask('#.##0,00', {reverse: true});
    $('#height').mask('#.##0,00', {reverse: true});
    $('#diameter').mask('#.##0,00', {reverse: true});
    $('#edit-weight').mask('#.##0,00', {reverse: true});
    $('#edit-width').mask('#.##0,00', {reverse: true});
    $('#edit-length').mask('#.##0,00', {reverse: true});
    $('#edit-height').mask('#.##0,00', {reverse: true});
    $('#edit-diameter').mask('#.##0,00', {reverse: true});


});  

//ADICIONAR OS DADOS DO PRODUTO NO BANCO VIA AJAX
$('#formProduct').submit(function (event) {
    var formData = new FormData(this);
    event.preventDefault();
    $.ajax({
        url: 'assets/php/product/add-product.php',
        type: 'POST',
        data: formData,                  
        success: function (result) {
                
            $('#formProduct input').val(''); //LIMPA OS INPUTS 
            $('#ModalConfirm').modal('show'); //ABRE O MODAL 
            $('#ModalConfirm').on('hidden.bs.modal', function () {
                window.location.href = "products.php";
            })            
        },
        Error: function () {
            $('#formProduct input').val(''); //LIMPA OS INPUTS
        },      
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }          
    });
});


$('#FormModalProduct').submit(function (event) {
    var formData = new FormData(this);
    formData.append('id', $('.save').data('id'));

    event.preventDefault();
    $.ajax({
        url: 'assets/php/product/edit-product.php',
        type: 'POST',
        data: formData,                  
        success: function (result) {

            $('#ModalFormProducts input').val(''); //FECHA O MODAL
            $('#ModalFormProducts').modal('hide'); //FECHA O MODAL
            $('#ModalConfirm').modal('show'); //ABRE O MODAL  
            $.ajax({
                url: 'assets/php/product/select-product.php',
                success: function(response) {
                    $('.ajax-reponse-select-product').html(response);        
                },
            });           
        },
        Error: function () {
            $('#ModalFormProducts').modal('hide'); //FECHA O MODAL
            $('#formProduct input').val(''); //LIMPA OS INPUTS
        },      
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function() {
                    /* faz alguma coisa durante o progresso do upload */
                }, false);
            }
            return myXhr;
        }          
    });
});

var idProduct = '';

function confirmarExclusaoImagem(id) {
    let idImage = id;
    var resposta = confirm("Deseja remover essa Imagem?");
    if (resposta == true) {
        $.ajax({
            url: 'assets/php/product/image/delete-image.php',
            type: 'POST',
            data:{ id: idImage },                  
            success: function (result) {
                $.ajax({
                    url: 'assets/php/product/image/select-image-product.php',
                    type: 'POST',
                    data:{ id: idProduct},
                    success: function(response) {
                        $('.ajax-reponse-select-image-product').html(response);        
                    },
                });
            }
        });    
    }    
}   

function editarAbout(id) {

    $('#ModalFormProducts').modal('show'); //ABRE O MODAL

    idProduct = id;
    let buttonId = "#"+id; //ID DO BOTAO PRESSIONADO
    var options= $(buttonId).data('options');
    if(!Number.isInteger(options)){
        var option = options.split(',');
        if (options.indexOf(",") > 0) {
            $.each(option, function (key, value) {
                $('[name="option['+value+']"]').val($(buttonId).data('option['+value+']'));
            })
        }
    }else{
        $('[name="option['+options+']"]').val($(buttonId).data('option['+options+']'));
    }

    $.ajax({
        url: 'assets/php/product/image/select-image-product.php',
        type: 'POST',
        data:{ id: idProduct },
        success: function(response) {
            $('.ajax-reponse-select-image-product').html(response);        
        },
    });
    

    $('#edit-nameProduct').val($(buttonId).data('nome'));
    $('#categorie').val($(buttonId).data('categoria'));
    $('#brand').val($(buttonId).data('marca'));
    $('#edit-description').val($(buttonId).data('descricao'));
    $('#edit-stock').val($(buttonId).data('estoque'));
    $('#edit-priceFrom').val($(buttonId).data('precode'));
    $('#edit-priceFor').val($(buttonId).data('precopara'));
    $('#edit-weight').val($(buttonId).data('peso'));
    $('#edit-width').val($(buttonId).data('largura'));
    $('#edit-length').val($(buttonId).data('comprimento'));
    $('#edit-height').val($(buttonId).data('altura'));
    $('#edit-diameter').val($(buttonId).data('diametro'));
    $('#dep').children('div').remove();


    $('.save').data('id', id); 

}  

function confirmarExclusaoProduct(id) {
    var resposta = confirm("Deseja remover esse produto?");
    if (resposta == true) {
        window.location.href = "assets/php/product/delete-product.php?id="+id;
    }
}   
