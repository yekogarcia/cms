<?php

require_once '../../controllers/gestorArticulos.php';
require_once '../../models/gestorArticulos.php';

class Ajax {

    public $imagenTemporal;

    public function gestorArticulosAjax() {
        $datos = $this->imagenTemporal;
        $resp = GestorArticulos::mostrarImagenController($datos);
        echo $resp;
    }

//actualiza orden
    public $idArticulo;
    public $ordenArticulo;

    public function actualizaOrdenAjax() {
        $datos = array("idArticulo" => $this->idArticulo,
            "ordenArticulo" => $this->ordenArticulo);
        $res = GestorArticulos::actualizarOrdenController($datos);
        echo $res;
    }

}

if (isset($_FILES["imagen"]["tmp_name"])) {
    $a = new Ajax();
    $a->imagenTemporal = $_FILES["imagen"]["tmp_name"];
    $a->gestorArticulosAjax();
}
if (isset($_POST["ordenArticulo"])) {
    $b = new Ajax();
    $b->idArticulo = $_POST["idArticulo"];
    $b->ordenArticulo = $_POST["ordenArticulo"];
    $b->actualizaOrdenAjax();
}
