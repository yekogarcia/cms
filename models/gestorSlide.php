<?php

require_once 'backend/models/conexion.php';

class SlideModels {

    public function selectSlideModel($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");
        if (!$stmt->execute()) {
            echo "error";
        }
        return $stmt->fetchAll();
        $stmt->close();
    }

}
