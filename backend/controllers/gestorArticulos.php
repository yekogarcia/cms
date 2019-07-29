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
                                     "introduccion" => $_POST["introArticulo"],
                                     "ruta" => $ruta,
                                     "contenido" => $_POST["contenidoArticulo"]);
            $res = GestorArticulosModel::guardarArticulosModel($datosController, "articulos");
            if ($res == "ok") {
                echo'<script>
                    swal({
                        title: "OK!",
                        text: "La imagen se subio con exito!",
                        icon: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false

                    })
                            .then((isConfirm) => {
                                if (isConfirm) {
                                    window.location = "articulos";
                                }

                            });</script>';
            }else{
                echo  $res;
            }
        }
    }

}
