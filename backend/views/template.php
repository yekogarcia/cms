<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BackEnd</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="views/views/images/icono.jpg">

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/css/style.css">
	<link rel="stylesheet" href="views/css/fonts.css">
  <link rel="stylesheet" href="views/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="views/css/responsive.bootstrap.min.css">
	<!-- <link rel="stylesheet" href="views/css/jquery-ui.min.css"> -->
	<link rel="stylesheet" href="views/css/sweetalert.css">
	<link rel="stylesheet" href="views/css/cssFancybox/jquery.fancybox.css">
	<link rel="stylesheet" href="views/css/jquery-ui.min.css">

	<script src="views/js/jquery-2.2.0.min.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/jquery.fancybox.js"></script>
        <!--https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js-->
	<script src="views/js/jquery.dataTables.min.js"></script>
	<script src="views/js/dataTables.bootstrap.min.js"></script>
	<script src="views/js/dataTables.responsive.min.js"></script>
	<script src="views/js/responsive.bootstrap.min.js"></script>
	<script src="views/js/jquery-ui.min.js"></script>
	<script src="views/js/sweetalert.min.js"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

</head>

<body>

	<div class="container-fluid">

		<section class="row">

		<!--=====================================
		COLUMNA BOTONERA
		======================================-->
		<!--====  FIn de COLUMNA BOTONERA  ====-->

		<!--=====================================
		COLUMNA CONTENIDO
		======================================-->
     <?php
     $plantilla = new Enlaces();
      $plantilla->enlacesController();
      ?>
			<!--=====================================
			 CABEZOTE
			======================================-->
			<!--====  Fin de CABEZOTE  ====-->

			<!--=====================================
			SUSCRIPTORES
			======================================-->
			<!--====  Fin de SUSCRIPTORES  ====-->

		<!--====  Fin de COLUMNA CONTENIDO  ====-->

		</section>

	</div>

	<script src="views/js/script.js"></script>
	<script src="views/js/validarIngreso.js"></script>
	<script src="views/js/gestorSlide.js"></script>

</body>

</html>
