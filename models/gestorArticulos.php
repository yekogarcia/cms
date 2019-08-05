<?php
require_once 'backend/models/conexion.php';
class ArticulosModels{
    public function seleccionarArticulosModel($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY orden ASC");
        if (!$stmt->execute()) {
            return "error";
        }
        return $stmt->fetchAll();
        $stmt->close();
    }
    
}
