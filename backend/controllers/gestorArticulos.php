<?php

class GestorArticulos {

    public function mostrarImagenController($datos) {
        list($ancho, $alto) = getimagesize($datos);
        if ($ancho < 800 || $alto < 400) {
            echo 0;
        } else {
            $aleatorio = mt_rand(100, 999);
            $ruta = "../../views/images/articulos/temp/articulo" . $aleatorio . ".jpg";
            $origen = imagecreatefromjpeg($datos);
            $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 800, "height" => 400]);
            imagejpeg($destino, $ruta);
            echo $ruta;
        }
    }

    public function guardarArticuloController() {
        if (isset($_POST["tituloArticulo"])) {
            $imagen = $_FILES["imagen"]["tmp_name"];
            $borrar = glob("views/images/articulos/temp/*");
            foreach ($borrar as $file) {
                unlink($file);
            }
            $aleatorio = mt_rand(100, 999);
            $ruta = "views/images/articulos/articulo" . $aleatorio . ".jpg";
            $origen = imagecreatefromjpeg($imagen);
            $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 800, "height" => 400]);
            imagejpeg($destino, $ruta);
            $datosController = array("titulo" => $_POST["tituloArticulo"],
                "introduccion" => $_POST["introArticulo"] . "...",
                "ruta" => $ruta,
                "contenido" => $_POST["contenidoArticulo"]);
            $res = GestorArticulosModel::guardarArticulosModel($datosController, "articulos");
            if ($res == "ok") {
                echo'<script>
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

                            });</script>';
            } else {
                echo $res;
            }
        }
    }

    public function mostrarArticuloController() {
        $res = GestorArticulosModel::mostrarArticulosModel("articulos");
        foreach ($res as $row => $item) {
            echo ' <li id="' . $item["id"] . '" class="bloqueArticulo">
            <span class="handleArticle">
              <a href="index.php?action=articulos&idBorrar=' . $item["id"] . '&rutaImagen=' . $item["ruta"] . '">
              <i class="fa fa-times btn btn-danger"></i>
              </a>
              <i class="fa fa-pencil btn btn-primary editarArticulo"></i>
            </span>
              <img src="' . $item["ruta"] . '" class="img-thumbnail">
              <h1>' . $item["titulo"] . '</h1>
              <p>' . $item["introduccion"] . '</p>
              <input type="hidden" value="' . $item["contenido"] . '">
              <a href="#articulo' . $item["id"] . '" data-toggle="modal">
              <button class="btn btn-default">Leer Más</button>
              </a>
              <hr>
           </li>
        <div id="articulo' . $item["id"] . '" class="modal fade">
         <div class="modal-dialog modal-content">
          <div class="modal-header" style="border:1px solid #eee">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h3 class="modal-title">' . $item["titulo"] . '</h3>
          </div>
          <div class="modal-body" style="border:1px solid #eee">
            <img src="' . $item["ruta"] . '" width="100%" style="margin-bottom:20px">
            <p class="parrafoContenido">' . $item["contenido"] . '</p>
        </div>
          <div class="modal-footer" style="border:1px solid #eee">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
     </div>
</div>';
        }
    }

    public function borrarArticuloController() {
        if (isset($_GET["idBorrar"])) {
            unlink($_GET["rutaImagen"]);
            $res = GestorArticulosModel::borrarArticulosModel($_GET["idBorrar"], "articulos");
            if ($res == "ok") {
                echo'<script>
                    swal({
                        title: "OK!",
                        text: "El articulo se a eliminado con exito!",
                        icon: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    })
                            .then((isConfirm) => {
                                if (isConfirm) {
                                    window.location = "articulos";
                                }

                            });</script>';
            } else {
                echo $res;
            }
        }
    }

    public function editarArticuloController() {
        if (isset($_POST["titulo"])) {
            $ruta = "";
            if (isset($_FILES["editarImagen"]["tmp_name"])) {
                $imagen = $_FILES["editarImagen"]["tmp_name"];
                $aleatorio = mt_rand(100, 999);
                $ruta = "views/images/articulos/articulo" . $aleatorio . ".jpg";
                $origen = imagecreatefromjpeg($imagen);
                $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 800, "height" => 400]);
                imagejpeg($destino, $ruta);
                $borrar = glob("views/images/articulos/temp/*");
                foreach ($borrar as $file) {
                    unlink($file);
                }
            }
            if ($ruta == "") {
                $ruta = $_POST["fotoAntigua"];
            } else {
                unlink($_POST["fotoAntigua"]);
            }
            $datos = array("id" => $_POST["idArticulo"],
                "titulo" => $_POST["titulo"],
                "introduccion" => $_POST["introduccion"],
                "ruta" => $ruta,
                "contenido" => $_POST["contenido"]);
            $res = GestorArticulosModel::editarArticuloModel($datos, "articulos");
            if ($res == "ok") {
                echo'<script>
                    swal({
                        title: "OK!",
                        text: "El articulo se a actualizado con exito!",
                        icon: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    })
                            .then((isConfirm) => {
                                if (isConfirm) {
                                    window.location = "articulos";
                                }

                            });</script>';
            } else {
                echo $res;
            }
        }
    }

    public function actualizarOrdenController($datos) {
        GestorArticulosModel::actulizarOrdenModel($datos, "articulos");
        $res = GestorArticulosModel::seleccionarOrdenModel("articulos");
        foreach ($res as $row => $item) {
            echo ' <li id="' . $item["id"] . '" class="bloqueArticulo">
            <span class="handleArticle">
              <a href="index.php?action=articulos&idBorrar=' . $item["id"] . '&rutaImagen=' . $item["ruta"] . '">
              <i class="fa fa-times btn btn-danger"></i>
              </a>
              <i class="fa fa-pencil btn btn-primary editarArticulo"></i>
            </span>
              <img src="' . $item["ruta"] . '" class="img-thumbnail">
              <h1>' . $item["titulo"] . '</h1>
              <p>' . $item["introduccion"] . '</p>
              <input type="hidden" value="' . $item["contenido"] . '">
              <a href="#articulo' . $item["id"] . '" data-toggle="modal">
              <button class="btn btn-default">Leer Más</button>
              </a>
              <hr>
           </li>
        <div id="articulo' . $item["id"] . '" class="modal fade">
         <div class="modal-dialog modal-content">
          <div class="modal-header" style="border:1px solid #eee">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h3 class="modal-title">' . $item["titulo"] . '</h3>
          </div>
          <div class="modal-body" style="border:1px solid #eee">
            <img src="' . $item["ruta"] . '" width="100%" style="margin-bottom:20px">
            <p class="parrafoContenido">' . $item["contenido"] . '</p>
        </div>
          <div class="modal-footer" style="border:1px solid #eee">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
     </div>
</div>';
        }
    }

}
