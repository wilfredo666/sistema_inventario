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
    $ruta["query"] == "ctrRegDevolucion" ||
    $ruta["query"] == "ctrRegProvExterno" ||
    $ruta["query"] == "ctrRegAjusteInventario" ||
    $ruta["query"] == "ctrRegOtrosIngresos" ||
    $ruta["query"] == "ctrRepMovimiento" ||
    $ruta["query"] == "ctrRepMenorProd" ||
    $ruta["query"] == "ctrRegVenta" ||
    $ruta["query"] == "ctrRegVentaOtros" ||
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
  static public function ctrInfoNotaIngreso($id, $codigo)
  {
    $respuesta = ModeloVenta::mdlInfoNotaIngreso($id, $codigo);
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

  static public function ctrRegEmpaque()
  {
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
  /* ===================================================
PARA REGISTRAR LAS NOTAS DE INGRESO POR DEVOLUCION
==================================================== */
  static public function ctrRegDevolucion()
  {
    require_once "../modelo/ventaModelo.php";
    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    $data = array(
      "fecha" => $fecha,
      "personal" => $_POST["personal"],
      "nroDevolucion" => $_POST["nroDevolucion"],
      "observacion" => $_POST["observacion"],
      "detalle" => $_POST["detalle"],
    );
    $respuesta = ModeloVenta::mdlRegDevolucion($data);
    echo $respuesta;
  }

  /* ===================================================
  PARA REGISTRAR LAS NOTAS DE INGRESO POR PROEVEEDORES EXTERNOS
  ==================================================== */
  static public function ctrRegProvExterno()
  {
    require_once "../modelo/ventaModelo.php";
    date_default_timezone_set("America/La_Paz");
    $fechas = date("Y-m-d");
    $hora = date("H:i:s");
    $data = array(
      "fecha" => $fechas,
      "personal" => $_POST["personal"],
      "nroComprobante" => $_POST["nroComprobante"],
      "observacion" => $_POST["observacion"],
      "detalle" => $_POST["detalle"],
    );

    $respuesta = ModeloVenta::mdlRegProvExterno($data);
    echo $respuesta;
  }

  /* ===================================================
  PARA REGISTRAR LAS NOTAS DE INGRESO POR AJUSTE DE INVENTARIOS
  ==================================================== */
  static public function ctrRegAjusteInventario()
  {
    require_once "../modelo/ventaModelo.php";
    date_default_timezone_set("America/La_Paz");
    $fechas = date("Y-m-d");
    $hora = date("H:i:s");
    $data = array(
      "fecha" => $fechas,
      "personal" => $_POST["personal"],
      "nroComprobante" => $_POST["nroComprobante"],
      "observacion" => $_POST["observacion"],
      "detalle" => $_POST["detalle"],
    );

    $respuesta = ModeloVenta::mdlRegAjusteInventario($data);
    echo $respuesta;
  }

  /* ===================================================
  PARA REGISTRAR LAS NOTAS DE INGRESO POR OTROS INGRESOS
  ==================================================== */
  static public function ctrRegOtrosIngresos()
  {
    require_once "../modelo/ventaModelo.php";
    date_default_timezone_set("America/La_Paz");
    $fechas = date("Y-m-d");
    $hora = date("H:i:s");
    $data = array(
      "fecha" => $fechas,
      "personal" => $_POST["personal"],
      "nroComprobante" => $_POST["nroComprobante"],
      "observacion" => $_POST["observacion"],
      "detalle" => $_POST["detalle"],
    );

    $respuesta = ModeloVenta::mdlRegOtrosIngresos($data);
    echo $respuesta;
  }

  /*=============================================
	MOSTRAR CANNTIDAD DE VENTAS
	=============================================*/
  static public function ctrMostrarCantVentas()
  {
    $respuesta = ModeloVenta::mdlMostrarCantVentas();
    return $respuesta;
  }
  static public function ctrUltimaVenta()
  {
    $respuesta = ModeloVenta::mdlUltimaVenta();
    return $respuesta;
  }

  static public function ctrMostrarCantVentasOtros()
  {
    $respuesta = ModeloVenta::mdlMostrarCantVentasOtros();
    return $respuesta;
  }
  static public function ctrUltimaVentaOtros()
  {
    $respuesta = ModeloVenta::mdlUltimaVentaOtros();
    return $respuesta;
  }

  /*=============================================
	PARA REGISTRAR LAS VENTAS
	=============================================*/
  static public function ctrRegVenta()
  {
    session_start(); //inicamos la sesion para obtener el id del usuario actual
    require_once "../modelo/ventaModelo.php";
    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    $data = array(
      "fecha" => $fecha,
      "cliente" => $_POST["cliente"],
      "nroComprobante" => $_POST["nroComprobante"],
      "observacion" => $_POST["observacion"],
      "detalle" => $_POST["detalle"],
      "subTotal" => $_POST["subTotal"],
      "totalNeto" => $_POST["totalNeto"],
      "totalDescuento" => $_POST["totalDescuento"],
      "usuario" => $_SESSION["idUsuario"],
    );
    $respuesta = ModeloVenta::mdlRegistroVenta($data);
    echo $respuesta;
  }

  // Función para convertir "MM/DD/YYYY" a "YYYY-MM-DD"
  function convertDate($date)
  {
    /* $dateArray = explode("/", $date); return $dateArray[2] . "-" . $dateArray[0] . "-" . $dateArray[1];*/
    echo $date;
  }

  //de reporte.js -> consultaMovimiento

  static public function ctrRepMovimiento()
  {
    //global convertDate();
    require_once "../modelo/ventaModelo.php";

    $rangoFecha = $_POST["reservation"];

    // Dividir las fechas en un array
    $fecha = explode(" - ", $rangoFecha);
    //convertDate($fecha[0]);
    echo $fechaInicial = $this->convertDate($fecha[0]);
    /* echo $fechaFinal = convertDate($fecha[1]);*/

    /*$data=array(
      "producto"=>$_POST["producto"],
      "fechaInicial"=>$fechaInicial,
      "fechaFinal"=>$fechaFinal,
      "tipoMovimiento"=>$_POST["tipoMovimiento"]
    );*/
    //var_dump($data);
    //ModeloVenta::mdlRepMovimiento($data);

  }

  static public function ctrMontoTotalVentas()
  {
    $respuesta = ModeloVenta::mdlMontoTotalVentas();
    return $respuesta;
  }


  /*=============================================
	PARA REGISTRAR LAS VENTAS OTROS CONCEPTOS
	=============================================*/
  static public function ctrRegVentaOtros()
  {
    session_start(); //inicamos la sesion para obtener el id del usuario actual
    require_once "../modelo/ventaModelo.php";
    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H:i:s");
    $data = array(
      "fecha" => $fecha,
      "cliente" => $_POST["cliente"],
      "nroComprobante" => $_POST["nroComprobante"],
      "observacion" => $_POST["observacion"],
      "concepto_salida" => $_POST["concepto_salida"],
      "detalle" => $_POST["detalle"],
      "subTotal" => $_POST["subTotal"],
      "totalNeto" => $_POST["totalNeto"],
      "totalDescuento" => $_POST["totalDescuento"],
      "usuario" => $_SESSION["idUsuario"],
    );
    /* var_dump($data); */
    $respuesta = ModeloVenta::mdlRegistroVentaOtros($data);
    echo $respuesta;
  }

  static public function ctrRepMenorProd()
  {
    $producto = $_POST["producto"];
    $fechaInicial = $_POST["fechaInicial"];
    $fechaFinal = $_POST["fechaFinal"];

    $data = array(
      "producto" => $producto,
      "fechaInicial" => $fechaInicial,
      "fechaFinal" => $fechaFinal,
    );
    /* var_dump($data); */
    require_once "../modelo/ventaModelo.php";
    $respuesta = ModeloVenta::mdlRepMenorProd($data);
    /* echo $respuesta; */
    echo json_encode($respuesta);
  }
}
