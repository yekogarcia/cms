<?php
require_once "conexion.php";

class gestorSlideModels{

  public function subirImagenSlide($ruta,  $tabla){
     $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ruta) VALUES (:ruta)");
     $stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);
     if(!$stmt->execute()){
       echo "error";
     }
     return "ok";
     $stmt->close();
  }

  public function mostraImagenSlide($ruta, $tabla){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta=:ruta");
    $stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);
    if(!$stmt->execute()){
      echo "error";
    }
    return $stmt->fetch();
    $stmt->close();
  }
  public function mostrarImagenVistaModel($tabla){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");
    if(!$stmt->execute()){
      echo "error";
    }
    return $stmt->fetchAll();
    $stmt->close();
  }

  public function eliminarSlideModel($datos, $tabla){
    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:idSlide");
    $stmt->bindParam(":idSlide", $datos["idSlide"], PDO::PARAM_INT);
    if(!$stmt->execute()){
      echo "error";
    }
    return $stmt->fetchAll();
    $stmt->close();
  }

}
