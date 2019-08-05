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
                } else {
                    $("#arrastreImagenArticulo").html('<div id="imagenArticulo"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>');
                }
            }
        });
    }
});
// Editar articulo
$(".editarArticulo").click(function () {
    idArticulo = $(this).parent().parent().attr("id");
    rutaImagen = $("#" + idArticulo).children("img").attr("src");
    titulo = $("#" + idArticulo).children("h1").html();
    introduccion = $("#" + idArticulo).children("p").html();
    contenido = $("#" + idArticulo).children("input").val();
    $("#" + idArticulo).html('<form method="post" enctype="multipart/form-data">\n\
<span>\n\
<input style="width:10%; padding: 5px 0; margin-top:4px;" type="submit" class="btn btn-primary pull-right" value="Guardar">\n\
</span>\n\
<div id="editarImagen">\n\
<input class="btn btn-default" style="display:none;" type="file" id="subirNuevaFoto"><div id="nuevaFoto">\n\
<span class="fa fa-times cambiarImagen">\n\
</span><img src="' + rutaImagen + '" class="img-thumbnail"></div>\n\
</div>\n\
<input type="text" value="' + titulo + '" name="titulo">\n\
<textarea cols="30" rows="5" name="introduccion">' + introduccion + '</textarea>\n\
<textarea cols="30" rows="5" name="contenido">' + contenido + '</textarea>\n\
<input type="hidden" value="' + idArticulo + '" name="idArticulo">\n\
<input type="hidden" value="' + rutaImagen + '" name="fotoAntigua">\n\
<hr></form>\n\
');
    $(".cambiarImagen").click(function () {
        $(this).hide();
        $("#subirNuevaFoto").show();
        $("#subirNuevaFoto").css({"width": "90%"});
        $("#nuevaFoto").html('');
        $("#subirNuevaFoto").attr("name", "editarImagen");
        $("#subirNuevaFoto").attr("required", true);
        $("#subirNuevaFoto").change(function () {
            imagen = this.files[0];
            imagenSize = imagen.size;
            if (Number(imagenSize) > 2000000) {
                $("#editarImagen").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>');
            } else {
                $(".alerta").remove();
            }
            imagenType = imagen.type;
            if (imagenType == "image/jpeg" || imagenType == "image/png") {
                $(".alerta").remove();
            } else {
                $("#editarImagen").before('<div class="alert alert-warning alerta text-center">El formato debe ser PNG o JPEG</div>');
            }

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
                        $("#nuevaFoto").before('<img src="views/images/status.gif" id="status">');
                    },
                    success: function (respuesta) {
                        $("#status").remove();
                        if (respuesta == 0) {
                            $("#editarImagen").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>');
                        } else {
                            $("#nuevaFoto").html('<div id="imagenArticulo"><img src="' + respuesta.slice(6) + '" class="img-thumbnail"></div>');
                        }
                    }
                });
            }
        });
    });
});

//Ordenar articulos
var almacenarOrdenId = new Array();
var OrdenItem = new Array();
$("#ordenarArticulos").click(function () {
    $("#ordenarArticulos").hide();
    $("#guardarOrden").show();

    $("#editarArticulo").css({"cursor": "move"});
    $("#editarArticulo span i").hide();
    $("#editarArticulo button").hide();
    $("#editarArticulo img").hide();
    $("#editarArticulo p").hide();
    $("#editarArticulo hr").hide();
    $("#editarArticulo div").remove();

    $(".bloqueArticulo h1").css({"font-size": "14px", "position": "absolute", "padding": "10px", "top": "-15px"});
    $(".bloqueArticulo").css({"padding": "2px"});
    $("#editarArticulo span").html('<i class="glyphicon glyphicon-move" style="padding:8px;"></i>');
    $("body, html").animate({
        scrollTop: $("body").offset().top
    });

    $("#editarArticulo").sortable({
        revert: true,
        connectWith: ".bloqueArticulo",
        handle: ".handleArticle",
        stop: function (event) {
            for (var i = 0; i < $("#editarArticulo li").length; i++) {
                almacenarOrdenId[i] = event.target.children[i].id;
                OrdenItem[i] = i + 1;
            }
        }
    });

    $("#guardarOrden").click(function () {
        $("#ordenarArticulos").show();
        $("#guardarOrden").hide();
        for (var i = 0; i < $("#editarArticulo li").length; i++) {
            var actulizarOrden = new FormData();
            actulizarOrden.append("idArticulo", almacenarOrdenId[i]);
            actulizarOrden.append("ordenArticulo", OrdenItem[i]);
            $.ajax({
                url: "views/ajax/gestorArticulos.php",
                method: "POST",
                data: actulizarOrden,
                cache: false,
                contentType: false,
                processData: false,
                success: function (res) {
                    $("#editarArticulo").html(res);
                    swal({
                        title: "OK!",
                        text: "El articulo se ah creado con exito!",
                        icon: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    })
                            .then((isConfirm) => {
                                if (isConfirm) {
                                    window.location = "articulos";
                                }

                            });
                }
            });
        }
    });
});



