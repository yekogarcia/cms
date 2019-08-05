<?php

require_once 'conexion.php';

class GestorArticulosModel {

    public function guardarArticulosModel($datos, $tabla) {
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

    public function mostrarArticulosModel($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");
        if (!$stmt->execute()) {
            return "error";
        }
        return $stmt->fetchAll();
        $stmt->close();
    }

    public function borrarArticulosModel($id, $tabla) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if (!$stmt->execute()) {
            return "error";
        }
        return "ok";
        $stmt->close();
    }

    public function editarArticuloModel($datos, $tabla) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo=:titulo,introduccion=:introduccion,ruta=:ruta,contenido=:contenido "
                . "WHERE id=:id");
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":introduccion", $datos["introduccion"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
//        $stmt->bindParam(":orden", 1, PDO::PARAM_INT);
        if (!$stmt->execute()) {
            return "error";
        }
        return "ok";
        $stmt->close();
    }

    public function actulizarOrdenModel($datos, $tabla) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden=:orden "
                . "WHERE id=:id");
        $stmt->bindParam(":id", $datos["idArticulo"], PDO::PARAM_INT);
        $stmt->bindParam(":orden", $datos["ordenArticulo"], PDO::PARAM_INT);
        if (!$stmt->execute()) {
            return "error";
        }
        return "ok";
        $stmt->close();
    }
    public function seleccionarOrdenModel($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");
        if (!$stmt->execute()) {
            return "error";
        }
        return $stmt->fetchAll();
        $stmt->close();
    }

}
