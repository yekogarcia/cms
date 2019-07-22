<?php

require_once "../../models/gestorSlide.php";
require_once "../../controllers/gestorSlide.php";
#clases y metodos

class Ajax {

    public $nombreImagen;
    public $imagenTemporal;

    public function gestorSlideAjax() {
        $datos = array("nombreImagen" => $this->nombreImagen,
            "imagenTemporal" => $this->imagenTemporal);
        $respuesta = GestorSlide::mostrarImagenController($datos);
        echo $respuesta;
    }

#Eliminar Item slide

    public $idSlide;
    public $rutaSlide;

    public function eliminarSlideAjax() {
        $datos = array("idSlide" => $this->idSlide,
            "rutaSlide" => $this->rutaSlide);
        $respuesta = GestorSlide::eliminarSlide($datos);
        echo $respuesta;
    }

#Actualizar slide 

    public $enviarId;
    public $enviarTitulo;
    public $enviarDescripcion;

    public function actualizarSlideAjax() {
        $datos = array("enviarId" => $this->enviarId,
            "enviarTitulo" => $this->enviarTitulo,
            "enviarDescripcion" => $this->enviarDescripcion);
        $respuesta = GestorSlide::actualizarSlideController($datos);
        echo $respuesta;
    }

    #actulizar orden slide

    public $actulizarOrdenSlide;
    public $actulizarOrdenItem;

    public function actualizarOrdenAjax() {
        $datos = array("ordenSlide" => $this->actulizarOrdenSlide,
            "ordenItem" => $this->actulizarOrdenItem);
        $respuesta = GestorSlide::actualizarOrdenController($datos);
        echo $respuesta;
    }

}

#objetos
if (isset($_FILES["imagen"]["name"])) {
    $a = new Ajax();
    $a->nombreImagen = $_FILES["imagen"]["name"];
    $a->imagenTemporal = $_FILES["imagen"]["tmp_name"];
    $a->gestorSlideAjax();
}

if (isset($_POST["idSlide"])) {
    $b = new Ajax();
    $b->idSlide = $_POST["idSlide"];
    $b->rutaSlide = $_POST["rutaSlide"];
    $b->eliminarSlideAjax();
}
if (isset($_POST["enviarId"])) {
    $c = new Ajax();
    $c->enviarId = $_POST["enviarId"];
    $c->enviarTitulo = $_POST["enviarTitulo"];
    $c->enviarDescripcion = $_POST["enviarDescripcion"];
    $c->actualizarSlideAjax();
}
if (isset($_POST["actulizarOrdenSlide"])) {
    $d = new Ajax();
    $d->actulizarOrdenSlide = $_POST["actulizarOrdenSlide"];
    $d->actulizarOrdenItem = $_POST["actulizarOrdenItem"];
    $d->actualizarOrdenAjax();
}

