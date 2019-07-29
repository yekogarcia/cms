<?php

require_once 'conexion.php';

class GestorArticulosModel {

    public function guardarArticulosModel($datos, $tabla) {
        var_dump($tabla);
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo,introduccion,ruta,contenido)"
                . " VALUES (:titulo,:introduccion,:ruta,:contenido)");
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":introduccion", $datos["introduccion"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
//        $stmt->bindParam(":orden", 1, PDO::PARAM_INT);
        if (!$stmt->execute()) {
            return "error";
        }
        return "ok";
        $stmt->close();
    }

}
