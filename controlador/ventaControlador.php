<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrReporteVentas" ||
    $ruta["query"] == "ctrAnularVenta" ||
    $ruta["query"] == "ctrRegNotaVenta" ||
    $ruta["query"] == "ctrCmbEstado" ||
    $ruta["query"] == "ctrRegNotaIngreso" ||
    $ruta["query"] == "ctrRegEmpaque" ||
    $ruta["query"] == "ctrRegNotaSalida"
  ) {
    $metodo = $ruta["query"];
    $Producto = new ControladorVenta();
    $Producto->$metodo();
  }
}


class ControladorVenta
{

  static public function ctrInfoVentas()
  {
    $respuesta = ModeloVenta::mdlInfoVentas();
    return $respuesta;
  }

  static public function ctrInfoFactura($id)
  {

    $respuesta = ModeloVenta::mdlInfoFactura($id);
    return $respuesta;
  }

  static public function ctrReporteVentas()
  {
    require_once "../modelo/ventaModelo.php";
    $fechaInicio = $_POST["inicio"];
    $fechaFinal = $_POST["final"];

    $respuesta = ModeloVenta::mdlReporteVentas($fechaInicio, $fechaFinal);

    echo json_encode($respuesta);
  }

  static public function ctrAnularVenta()
  {
    require_once "../modelo/ventaModelo.php";

    $id = $_POST["idVenta"];
    $respuesta = ModeloVenta::mdlAnularVenta($id);
    echo $respuesta;
  }

  static public function ctrRegNotaVenta()
  {
    session_start(); //inicamos la sesion para obtener el id del usuario actual
    require_once "../modelo/ventaModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H-i-s");

    $data = array(
      "numFactura" => $_POST["numFactura"],
      "idCliente" => $_POST["idCliente"],
      "usuario" => $_SESSION["idUsuario"],
      "fechaHora" => $fecha . " " . $hora,
      "productos" => $_POST["productos"],
      "totalVenta" => $_POST["totalVenta"],
      "descuentoVenta" => $_POST["descuentoVenta"],
      "netoVenta" => $_POST["netoVenta"]
    );

    $respuesta = ModeloVenta::mdlRegNotaVenta($data);
    echo $respuesta;

    var_dump($data);
  }

  /* ==============================================
PARA VER SI HAY VENTAS
====================================================*/
  static public function ctrInformacionVentas()
  {
    $respuesta = ModeloVenta::mdlInformacionVentas();
    return $respuesta;
  }

  /* ==============================================
PARA LAS VISTAS MODAL VER DE SALIDAS E INGRESOS
====================================================*/
  static public function ctrInfoNotaIngreso($id)
  {
    $respuesta = ModeloVenta::mdlInfoNotaIngreso($id);
    return $respuesta;
  }
  static public function ctrInfoNotaSalida($id)
  {
    $respuesta = ModeloVenta::mdlInfoNotaSalida($id);
    return $respuesta;
  }
  /* -------------------------------------------- */

  static public function ctrInfoNotaVenta($id)
  {
    $respuesta = ModeloVenta::mdlInfoNotaVenta($id);
    return $respuesta;
  }

  static public function ctrCmbEstado()
  {
    require_once "../modelo/ventaModelo.php";
    $id = $_POST["idVenta"];
    $respuesta = ModeloVenta::mdlCmbEstado($id);
    echo $respuesta;
  }

  /* PARA NOTAS DE SALIDAS */
  static public function ctrRegNotaSalida()
  {
    session_start();
    require_once "../modelo/ventaModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H-i-s");

    $data = array(
      "codSalida" => $_POST["codSalida"],
      "conceptoSalida" => $_POST["conceptoSalida"],
      "usuario" => $_SESSION["idUsuario"],
      "fechaHora" => $fecha . " " . $hora,
      "productos" => $_POST["productos"]
    );
    $respuesta = ModeloVenta::mdlRegNotaSalida($data);

    echo $respuesta;
  }

  static public function ctrInfoSalidas()
  {
    $respuesta = ModeloVenta::mdlInfoSalidas();
    return $respuesta;
  }

  static public function ctrInfoIngresos()
  {
    $respuesta = ModeloVenta::mdlInfoIngresos();
    return $respuesta;
  }

  static public function ctrRegNotaIngreso()
  {
    session_start(); //inicamos la sesion para obtener el id del usuario actual
    require_once "../modelo/ventaModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");

    $data = array(
      "codIngreso" => $_POST["codIngreso"],
      "conceptoIngreso" => $_POST["conceptoIngreso"],
      "usuario" => $_SESSION["idUsuario"],
      "fechaHora" => $fecha . " " . $hora,
      "productos" => $_POST["productos"]
    );

    $respuesta = ModeloVenta::mdlRegNotaIngreso($data);
    echo $respuesta;
  }

  static public function ctrRegEmpaque(){
    require_once "../modelo/ventaModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");

    $data = array(
      "fechaEmpaque" => $fecha,
      "personalEmpaque" => $_POST["personalEmpaque"],
      "nroEmpaque" => $_POST["nroEmpaque"],
      "observacionEmpaque" => $_POST["observacionEmpaque"],
      "detalle" => $_POST["detalle"],
    );
    $respuesta = ModeloVenta::mdlRegEmpaque($data);
    echo $respuesta;
  }
  
  static public function ctrCantidadVentas()
  {
    $respuesta = ModeloVenta::mdlCantidadVentas();
    return $respuesta;
  }

  static public function ctrTotalVentas()
  {
    $respuesta = ModeloVenta::mdlTotalVentas();
    return $respuesta;
  }
}
