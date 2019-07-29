<?php
require_once '../../controllers/gestorArticulos.php';
class Ajax {
    public $imagenTemporal;
    public function gestorArticulosAjax(){
        $datos = $this->imagenTemporal;
        $resp = GestorArticulos::mostrarImagenController($datos);
        echo $resp;
    }
}

if (isset($_FILES["imagen"]["tmp_name"])) {
    $a = new Ajax();
    $a->imagenTemporal = $_FILES["imagen"]["tmp_name"];
    $a->gestorArticulosAjax();
}
