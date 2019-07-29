<?php
 session_start();
if (!$_SESSION["validar"]) {
    header("location:ingreso");
    exit();
}
include "views/modules/botonera.php";
include "views/modules/cabezote.php";

 ?>
<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

    <button class="btn btn-info btn-lg" id="btnAgregarArticulo">Agregar Artículo</button>

    <!--==== AGREGAR ARTÍCULO  ====-->

    <div id="agregarArtículo" style="display:none;">
        <form action="articulos" method="post" enctype="multipart/form-data">
            <input type="text" name="tituloArticulo" placeholder="Título del Artículo" class="form-control " required>

            <textarea name="introArticulo" id="" cols="30" rows="5" placeholder="Introducción del Articulo" class="form-control" maxlength="169" required></textarea>

            <input type="file" name="imagen" class="btn btn-default" id="subirFoto" required >

            <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>

            <div id="arrastreImagenArticulo">
                <!--<div id="imagenArticulo"><img src="views/views/images/articulos/landscape01.jpg" class="img-thumbnail"></div>-->
            </div>

            <textarea name="contenidoArticulo" id="" cols="30" rows="10" placeholder="Contenido del Articulo" class="form-control" required></textarea>

            <input type="submit" id="guardarArticulo" class="btn btn-primary" value="Guardar Artículo">
        </form>
    </div>
            <?php
            $crearArticulo = new GestorArticulos();
            $res = $crearArticulo->guardarArticuloController();
            echo $res;
            ?>
    <hr>

    <!--==== EDITAR ARTÍCULO  ====-->

    <ul id="editarArticulo">
        <!--
            <li>
              <span>
              <i class="fa fa-times btn btn-danger"></i>
              <i class="fa fa-pencil btn btn-primary"></i>
              </span>
              <img src="views/views/images/articulos/landscape02.jpg" class="img-thumbnail">
              <h1>Lorem Ipsum</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#articulo1" data-toggle="modal">
              <button class="btn btn-default">Leer Más</button>
              </a>
        
              <hr>
        
            </li>
        
            <li>
              <span>
              <button class="btn btn-primary pull-right">Guardar</button>
              </span>
        
              <div id="editarImagen"><span class="fa fa-times"></span><img src="views/views/images/articulos/landscape03.jpg" class="img-thumbnail"></div>
        
              <input type="text" value="Lorem Ipsum">
        
              <textarea cols="30" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</textarea>
        
              <textarea name="" id="editarContenido" cols="30" rows="10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</textarea>
        
              <hr>
        
            </li>
        -->
    </ul>

    <button class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Artículos</button>

</div>

<!--====  Fin de ARTÍCULOS ADMINISTRABLE  ====-->

<!--=====================================
ARTÍCULO MODAL
======================================-->

<div id="articulo1" class="modal fade">
    <!--
          <div class="modal-dialog modal-content">
    
           <div class="modal-header" style="border:1px solid #eee">
    
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h3 class="modal-title">Lorem Ipsum</h3>
    
          </div>
    
          <div class="modal-body" style="border:1px solid #eee">
    
            <img src="views/views/images/articulos/landscape02.jpg" width="100%" style="margin-bottom:20px">
            <p class="parrafoContenido">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    
          </div>
    
          <div class="modal-footer" style="border:1px solid #eee">
    
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
          </div>
    
          </div>-->

</div>

<!--====  Fin de ARTICULO MODAL ====-->
