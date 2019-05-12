<?php
class GestorSlide{
public function mostrarImagenController($datos){
  list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);
  if($ancho < 1200 || $alto < 600){
    echo 0;
  }else{
    $aleatorio = mt_rand(1,100);
    // $ruta = "../../views/images/slide/".$datos["nombreImagen"];
    $ruta = "../../views/images/slide/slide".$aleatorio.".jpg";
    $origen = imagecreatefromjpeg($datos["imagenTemporal"]);
    $destino =imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1600, "height"=>600]);
    imagejpeg($destino, $ruta);
    gestorSlideModels::subirImagenSlide($ruta, "slide");
    $respuesta = gestorSlideModels::mostraImagenSlide($ruta, "slide");
    $enviarDatos=array("ruta"=>$respuesta["ruta"],
  "titulo"=>$respuesta["titulo"],"descripcion"=>$respuesta["descripcion"]);
      // echo $respuesta;
    echo json_encode($enviarDatos);
  }
}

#Mostrar imagenes
public function mostrarImagenVistaController(){
   $respuesta=gestorSlideModels::mostrarImagenVistaModel("slide");
    foreach ($respuesta as $row => $item) {
    echo '<li id="'.$item["id"].'" class="bloqueSlide">
      <span class="fa fa-times eliminarSlide" ruta="'.$item["ruta"].'"></span>
      <img src="'.substr($item["ruta"], 6).'" class="handleImg">
    </li>';
    }
}

public function ediarSlideController(){
$respuesta=gestorSlideModels::mostrarImagenVistaModel("slide");
 foreach ($respuesta as $row => $item) {
 echo '<li id="item'.$item["id"].'">
     <span class="fa fa-pencil" style="background:blue"></span>
     <img src="'.substr($item["ruta"], 6).'" style="float:left; margin-bottom:10px" width="80%">
     <h1>'.$item["titulo"].'</h1>
     <p>'.$item["descripcion"].'</p>
   </li>';
 }
}

public function eliminarSlide($datos){
  $respuesta = gestorSlideModels::eliminarSlideModel($datos, "slide");
  unlink($datos["rutaSlide"]);
  echo $respuesta;
}

}
