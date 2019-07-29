$("#btnAgregarArticulo").click(function (e) {
    $("#agregarArtículo").toggle(400);
});
//subir imagen atrves del input
var imagen = "";
$("#subirFoto").change(function () {
    imagen = this.files[0];
    //validar tamaño de la imagen
    imagenSize = imagen.size;
    if (Number(imagenSize) > 2000000) {
        $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>');
    } else {
        $(".alerta").remove();
    }
    // validar imagen
    imagenType = imagen.type;
    if (imagenType == "image/jpeg" || imagenType == "image/png") {
        $(".alerta").remove();
    } else {
        $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El formato debe ser PNG o JPEG</div>');
    }
    // mostrar imgen con ajax
    if (imagenType == "image/jpeg" || imagenType == "image/png" && Number(imagenSize) > 2000000) {
        var datos = new FormData();
        datos.append("imagen", imagen);
        $.ajax({
            url: "views/ajax/gestorArticulos.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#arrastreImagenArticulo").before('<img src="views/images/status.gif" id="status">');
            },
            success: function (respuesta) {
                if (respuesta == 0) {
                    $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>');
                }else{
                     $("#arrastreImagenArticulo").html('<div id="imagenArticulo"><img src="'+respuesta.slice(6)+'" class="img-thumbnail"></div>');
                }
            }
        });
    }
})


