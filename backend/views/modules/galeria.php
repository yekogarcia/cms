<?php
 session_start();
if (!$_SESSION["validar"]) {
    header("location:ingreso");
    exit();
}
?>
<!--=====================================
GALERIA ADMINISTRABLE
======================================-->

<div id="galeria" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

<hr>

<p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen, tamaño recomendado: 1600px * 600px</p>

  <ul id="lightbox">
    <li>
      <span class="fa fa-times"></span>
      <a rel="grupo" href="views/views/images/galeria/photo01.jpg">
      <img src="views/views/images/galeria/photo01.jpg">
      </a>
    </li>

    <li>
      <span class="fa fa-times"></span>
      <a rel="grupo" href="views/views/images/galeria/photo02.jpg">
      <img src="views/views/images/galeria/photo02.jpg">
      </a>
    </li>

    <li>
      <span class="fa fa-times"></span>
      <a rel="grupo" href="views/views/images/galeria/photo03.jpg">
      <img src="views/views/images/galeria/photo03.jpg">
      </a>
    </li>

    <li>
      <span class="fa fa-times"></span>
      <a rel="grupo" href="views/views/images/galeria/photo04.jpg">
      <img src="views/views/images/galeria/photo04.jpg">
      </a>
    </li>

    <li>
      <span class="fa fa-times"></span>
      <a rel="grupo" href="views/views/images/galeria/photo01.jpg">
      <img src="views/views/images/galeria/photo01.jpg">
      </a>
    </li>

    <li>
      <span class="fa fa-times"></span>
      <a rel="grupo" href="views/views/images/galeria/photo02.jpg">
      <img src="views/views/images/galeria/photo02.jpg">
      </a>
    </li>

    <li>
      <span class="fa fa-times"></span>
      <a rel="grupo" href="views/views/images/galeria/photo03.jpg">
      <img src="views/views/images/galeria/photo03.jpg">
      </a>
    </li>

    <li>
      <span class="fa fa-times"></span>
      <a rel="grupo" href="views/views/images/galeria/photo04.jpg">
      <img src="views/views/images/galeria/photo04.jpg">
      </a>
    </li>
  </ul>

  <button class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Imágenes</button>

</div>

<!--====  Fin de GALERIA ADMINISTRABLE  ====-->
