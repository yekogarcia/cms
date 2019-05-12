// console.log($("#columnasSlide").html());
//Arrastrat imagenes
if ($("#columnasSlide").html() == 0) {
$("#columnasSlide").css({"height":"100px"});
}else{
  $("#columnasSlide").css({"height":"auto"});
}

//Subir imagenes

$("#columnasSlide").on("dragover", function(e){
  e.preventDefault();
  e.stopPropagation();
  $("#columnasSlide").css({"background":"gray"});
  // $("#columnasSlide").css({"background":"url(views/images/pattern.jpg)"});
});

//Soltar imagenes

$("#columnasSlide").on("drop", function(e){
  e.preventDefault();
  e.stopPropagation();

  $("#columnasSlide").css({"background":"white"})
  var archivo = e.originalEvent.dataTransfer.files;
    var imagen = archivo[0];
    var imagenSize = imagen.size;
  // validar tamaño de la imagen
    if (Number(imagenSize) > 2000000) {
      $("#columnasSlide").before('<div class="alert alerta alert-warning text-center">El archivo exede el peso permitido, 200 Kb</di>')
    }else {
      $(".alerta").remove();
    }

//   //Validar tipo de imagenes
  var imagenType = imagen.type;
  if (imagenType=="image/jpeg" || imagenType == "image/png") {
      $(".alerta").remove();
  }else {
    $("#columnasSlide").before('<div class="alert alerta alert-warning text-center">El archivo debe ser formato png o jpeg</di>')
  }


  //Subir imagen al servidor
  if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {
      var datos = new FormData();
      datos.append("imagen", imagen);

      $.ajax({
        url: "views/ajax/gestorSlide.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function(){
          $("#columnasSlide").before('<img src="views/images/ajax-loader.gif" id="status">');
        },
        success: function(respuesta){
          console.log(respuesta);
          $("#status").remove();
             if (respuesta == 0) {
               $("#columnasSlide").before('<div class="alert alerta alert-warning text-center">La imagen es inferior a 1600 * 600 px</di>');
             }else {
               $("#columnasSlide").css({"height":"auto"});
               $("#columnasSlide").append('<li class="bloqueSlide"><span class="fa fa-times eliminarSlide"></span><img src="'+respuesta["ruta"].slice(6)+'" class="handleImg"></li>');

               $("#ordenarTextSlide").append('<li><span class="fa fa-pencil" style="background:blue"></span><img src="'+respuesta["ruta"].slice(6)+'" style="float:left; margin-bottom:10px" width="80%"><h1>'+respuesta["titulo"]+'</h1><p>'+respuesta["descripcion"]+'</p></li>');

               swal({
                  title: "OK!",
                  text: "La imagen se subio con exito!",
                  icon: "success",
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false

                  })
                  .then((isConfirm)=>{
                    if (isConfirm) {
                      window.location = "slide";
                    }

                  });

             }
        }
      });
  }
  });

//Eliminar item slide

$(".eliminarSlide").click(function(){
   idSlide = $(this).parent().attr("id");
   rutaSlide= $(this).attr("ruta");
   $(this).parent().remove();
   $("#item"+idSlide).remove();

   var eliminarItem = new FormData();
     eliminarItem.append("idSlide", idSlide);
     eliminarItem.append("rutaSlide", rutaSlide);
     $.ajax({
        url: "views/ajax/gestorSlide.php",
        method: "POST",
        data: eliminarItem,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
           console.log(respuesta);
        }
     })
});
