<?php
 session_start();
if (!$_SESSION["validar"]) {
    header("location:ingreso");
    exit();
}
?>
<!--=====================================
MENSAJES
======================================-->

<div id="bandejaMensajes" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

   <div >
      <h1>Bandeja de Entrada</h1>
      <hr>
   </div>

    <div class="well well-sm">

    <span class="fa fa-times pull-right"></span>
    <h3>De: Lorem Ipsum</h3>
    <h5>Email: correo@correo.com</h5>
      <p>Lorem ipsum dolor sit amet, consectetur...</p>
      <button class="btn btn-info btn-sm">Leer</button>

    </div>

    <div class="well well-sm">

    <span class="fa fa-times pull-right"></span>
    <h3>De: Lorem Ipsum</h3>
    <h5>Email: correo@correo.com</h5>
      <p>Lorem ipsum dolor sit amet, consectetur...</p>
      <button class="btn btn-info btn-sm">Leer</button>

    </div>

    <div class="well well-sm">

    <span class="fa fa-times pull-right"></span>
    <h3>De: Lorem Ipsum</h3>
    <h5>Email: correo@correo.com</h5>
      <p>Lorem ipsum dolor sit amet, consectetur...</p>
      <button class="btn btn-info btn-sm">Leer</button>

    </div>

  </div>

  <div id="lecturaMensajes" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

   <div >
    <hr>
     <button class="btn btn-success">Enviar mensaje a todos los usuarios</button>
      <hr>
   </div>

   <form action="">

    <p>Para: Todos los usuarios</p>

    <input type="text" placeholder="Título del Mensaje" class="form-control">

    <textarea name="" id="" cols="30" rows="5" placeholder="Escribe tu mensaje..." class="form-control"></textarea>

    <input type="button" class="form-control btn btn-primary" value="Enviar">

   </form>

   <div class="well well-sm">

    <span class="fa fa-times pull-right"></span>
    <h3>De: Lorem Ipsum</h3>
    <h5>Email: correo@correo.com</h5>
      <p style="background:#fff; padding:10px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <button class="btn btn-info btn-sm">Responder</button>

    </div>



  </div>

<!--====  Fin de MENSAJES  ====-->
