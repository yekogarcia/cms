  <?php
  class Ingreso{
    public function ingresoController(){
      if (!isset($_POST["usuarioIngreso"])) {
        return;
      }
      if (preg_match('/^[a-zA-Z0-9]*$/',$_POST["usuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]*$/',$_POST["passwordIngreso"])) {
       $encriptar = crypt($_POST["passwordIngreso"], '$115151551asddfsdfkskdfsf1ds5fs5djsdjbn___sdfbw$');
       $datos= array("usuario"=>$_POST["usuarioIngreso"],
                   "password"=>$_POST["passwordIngreso"]);
                   $respuesta= IngresoModels::ingresoModel($datos, "usuarios");
                   $intentos = $respuesta["intentos"];
                  if ($intentos < 2) {
                  if ($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]) {
                      $intentos = 0;
                      session_start();
                      $_SESSION["validar"] = true;
                      $_SESSION["usuario"] = $respuesta["usuario"];
                      header("location:inicio");
                  }else{
                      ++$intentos;
                    echo "<div class='alert alert-danger'>Error al ingresar</div>";
                  }
                  $data = array("usuario"=>$_POST["usuarioIngreso"], "intentos"=>$intentos);
                  $resIntentos = IngresoModels::intentosModel($data, "usuarios");

    }else{
      $intentos = 0;
      $data = array("usuario"=>$_POST["usuarioIngreso"], "intentos"=>$intentos);
      $resIntentos = IngresoModels::intentosModel($data, "usuarios");
      echo "<div class='alert alert-danger'>Ha fallado 3 veces Intente mas tarde</div>";
    }
  }
  }

  }
