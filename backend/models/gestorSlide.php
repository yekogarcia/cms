<?php

require_once "conexion.php";

class gestorSlideModels {

    public function subirImagenSlide($ruta, $tabla) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ruta) VALUES (:ruta)");
        $stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);
        if (!$stmt->execute()) {
            echo "error";
        }
        return "ok";
        $stmt->close();
    }

    public function mostraImagenSlide($ruta, $tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta=:ruta");
        $stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);
        if (!$stmt->execute()) {
            echo "error";
        }
        return $stmt->fetch();
        $stmt->close();
    }

    public function mostrarImagenVistaModel($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");
        if (!$stmt->execute()) {
            echo "error";
        }
        return $stmt->fetchAll();
        $stmt->close();
    }

    public function eliminarSlideModel($datos, $tabla) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:idSlide");
        $stmt->bindParam(":idSlide", $datos["idSlide"], PDO::PARAM_INT);
        if (!$stmt->execute()) {
            echo "error";
        }
        return $stmt->fetchAll();
        $stmt->close();
    }

    public function actulizarSlideModel($datos, $tabla) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo=:titulo, descripcion=:descripcion"
                . " WHERE id=:id");
        $stmt->bindParam(":id", $datos["enviarId"], PDO::PARAM_INT);
        $stmt->bindParam(":titulo", $datos["enviarTitulo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["enviarDescripcion"], PDO::PARAM_STR);
        if (!$stmt->execute()) {
            return "error";
        }
        return "ok";
        $stmt->close();
    }

    public function selectActulizacionSlideModel($datos, $tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id");
        $stmt->bindParam(":id", $datos["enviarId"], PDO::PARAM_INT);
        if (!$stmt->execute()) {
            echo "error";
        }
        return $stmt->fetch();
        $stmt->close();
    }

    public function actulizarOrdenModel($datos, $tabla) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET orden=:orden"
                . " WHERE id=:id");
        $stmt->bindParam(":id", $datos["ordenSlide"], PDO::PARAM_INT);
        $stmt->bindParam(":orden", $datos["ordenItem"], PDO::PARAM_STR);
        if (!$stmt->execute()) {
            return "error";
        }
        return "ok";
        $stmt->close();
    }

    public function selectOrdenModel($datos, $tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");
        if (!$stmt->execute()) {
            echo "error";
        }
        return $stmt->fetchAll();
        $stmt->close();
    }

}
