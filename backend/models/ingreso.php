<?php
require_once "conexion.php";

class IngresoModels{
  public function ingresoModel($datos, $tabla){
    $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario=:usuario");
    $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    // $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
  }
  public function intentosModel($datos, $tabla){
    $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET intentos=:intentos WHERE usuario=:usuario");
    $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":intentos", $datos["intentos"], PDO::PARAM_STR);
    if ($stmt->execute()) {
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
  }
}
