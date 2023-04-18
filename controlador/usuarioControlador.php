<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegUsuario" ||
    $ruta["query"] == "ctrEditUsuario" ||
    $ruta["query"] == "ctrEliUsuario" ||
    $ruta["query"] == "ctrBusUsuario"
  ) {
    $metodo = $ruta["query"];
    $usuario = new ControladorUsuario();
    $usuario->$metodo();
  }
}

class ControladorUsuario
{
  static public function ctrIngresoUsuario()
  {
    if (isset($_POST["usuario"])) {
      $usuario = $_POST["usuario"];
      $password = $_POST["password"];

      $respuesta = ModeloUsuario::mdlAccesoUsuario($usuario);

      if ($usuario == $respuesta['login_usuario'] && password_verify($password, $respuesta['password']) && $respuesta["estado"] == 1) {
        $_SESSION["ingreso"] = "ok";
        $_SESSION["login_usuario"] = $respuesta["login_usuario"];
        $_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
        $_SESSION["perfil"] = $respuesta["perfil"];
        $_SESSION["idUsuario"]=$respuesta["id_usuario"];

        date_default_timezone_set("America/La_Paz");
        $fecha = date("Y-m-d");
        $hora = date("H-i-s");

        $fechaHora = $fecha . " " . $hora;
        $id = $respuesta["id_usuario"];

        $ultimoLogin = ModeloUsuario::mdlActualizarAcceso($fechaHora, $id);

        if ($ultimoLogin == "ok") {
          echo '<script>
                             window.location="inicio";
                         </script>';
        }
      } else {
        echo "<p class='text-danger text-center bg-red mt-1 rounded-pill'>Error de acceso, intente de nuevo</p>";
      }
    }
  }

  static public function ctrInfoUsuarios()
  {
    $respuesta = ModeloUsuario::mdlInfoUsuarios();
    return $respuesta;
  }

  static public function ctrRegUsuario()
  {
    require "../modelo/usuarioModelo.php";

    $password = password_hash($_POST["passUsuario"], PASSWORD_DEFAULT);
    $data = array(
      "loginUsuario" => $_POST["loginUsuario"],
      "nomUsuario" => $_POST["nomUsuario"],
      "passUsuario" => $password,
      "perfilUsuario" => $_POST["perfilUsuario"],
    );

    $respuesta = ModeloUsuario::mdlRegUsuario($data);
    echo $respuesta;
  }

  static public function ctrInfoUsuario($id)
  {
    $respuesta = ModeloUsuario::mdlInfoUsuario($id);
    return $respuesta;
  }

  static public function ctrEditUsuario()
  {
    require "../modelo/usuarioModelo.php";

    $passActual = $_POST["passActual"];
    if ($passActual == $_POST["passUsuario"]) {
      $password = $passActual;
    } else {
      $password = password_hash($_POST["passUsuario"], PASSWORD_DEFAULT);
    }

    $data = array(
      "idUsuario" => $_POST["idUsuario"],
      "nomUsuario" => $_POST["nomUsuario"],
      "passUsuario" => $password,
      "estadoUsuario" => $_POST["estadoUsuario"],
      "perfilUsuario" => $_POST["perfilUsuario"]
    );

    $respuesta = ModeloUsuario::mdlEditUsuario($data);
    echo $respuesta;
  }

  static public function ctrUsuarioPermiso($idUsuario,$idPermiso){
    $respuesta = ModeloUsuario::mdlUsuarioPermiso($idUsuario,$idPermiso);
    return $respuesta;
  }

  static public function ctrActualizarPermiso(){
    require "../modelo/usuarioModelo.php";

    $data=array(
      "idUsuario"=>$_POST["idUsuario"],
      "idPermiso"=>$_POST["idPermiso"]
    );

    $respuesta = ModeloUsuario::mdlActualizarPermiso( $data );
    echo $respuesta;
  }

  static public function ctrEliUsuario(){
    require "../modelo/usuarioModelo.php";

    $id=$_POST["id"];

    $respuesta = ModeloUsuario::mdlEliUsuario($id);
    echo $respuesta;

  }
  
  static public function ctrCantidadUsuarios(){
    $respuesta = ModeloUsuario::mdlCantidadUsuarios();
    return $respuesta;
  }

}
