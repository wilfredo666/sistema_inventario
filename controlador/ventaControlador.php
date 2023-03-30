<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegistroFactura" ||
    $ruta["query"] == "ctrLeyenda" ||
    $ruta["query"] == "ctrReporteVentas" ||
    $ruta["query"] == "ctrAnularVenta" ||
    $ruta["query"] == "ctrRegNotaVenta" ||
    $ruta["query"] == "ctrRegNotaEntrega" ||
    $ruta["query"] == "ctrVentaPersonal" ||
    $ruta["query"] == "ctrCmbEstado" ||
    $ruta["query"] == "ctrInfoVentasChofer" ||
    $ruta["query"] == "ctrRegNotaSalida"
  ) {
    $metodo = $ruta["query"];
    $Producto = new ControladorVenta();
    $Producto->$metodo();
  }
}


class ControladorVenta
{

  static public function ctrRegistroFactura()
  {
    require_once "../modelo/ventaModelo.php";

    $data = array(
      "numFactura" => $_POST["numFactura"],
      "idCliente" => $_POST["idCliente"],
      "productos" => $_POST["productos"],
      "subTotal" => $_POST["subTotal"],
      "descAdicional" => $_POST["descAdicional"],
      "totApagar" => $_POST["totApagar"],
      "fechaEmision" => $_POST["fechaEmision"],
      "cuf" => $_POST["cuf"],
      "cufd" => $_POST["cufd"],
      "xml" => $_POST["xml"],
      "usuarioLogin" => $_POST["usuarioLogin"],
      "leyenda" => $_POST["leyenda"]
    );

    $respuesta = ModeloVenta::mdlRegistroFactura($data);
    echo $respuesta;
  }

  static public function ctrInfoVentas()
  {
    $respuesta = ModeloVenta::mdlInfoVentas();
    return $respuesta;
  }

  static public function ctrInfoFactura($id){

    $respuesta=ModeloVenta::mdlInfoFactura($id);
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
    $respuesta=ModeloVenta::mdlAnularVenta($id);
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

    /* var_dump($data); */
  }

  static public function ctrRegNotaEntrega()
  {
    session_start();
    require_once "../modelo/ventaModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H-i-s");

    $data = array(
      "chofer" => $_POST["chofer"],
      "vehiculo" => $_POST["vehiculo"],
      "usuario" => $_SESSION["idUsuario"],
      "fechaHora" => $fecha . " " . $hora,
      "productos" => $_POST["productos"],
      "zonaVenta" => $_POST["zonaVenta"]
    );

    $respuesta = ModeloVenta::mdlRegNotaEntrega($data);
    echo $respuesta;
  }

  static public function ctrInfoNotasEntrega()
  {
    $respuesta = ModeloVenta::mdlInfoNotasEntrega();
    return $respuesta;
  }

  static public function ctrInfoNotaEntrega($id)
  {
    $respuesta = ModeloVenta::mdlInfoNotaEntrega($id);
    return $respuesta;
  }
/* ==============================================
PARA LAS VISTAS MODAL VER DE SALIDAS E INGRESOS
====================================================*/
  static public function ctrInfoNotaIngreso($id){
    $respuesta = ModeloVenta::mdlInfoNotaIngreso($id);
    return $respuesta;
  }
  static public function ctrInfoNotaSalida($id){
    $respuesta = ModeloVenta::mdlInfoNotaSalida($id);
    return $respuesta;
  }
  /* -------------------------------------------- */

  static public function ctrInfoNotaVenta($id)
  {
    $respuesta = ModeloVenta::mdlInfoNotaVenta($id);
    return $respuesta;
  }

  static public function ctrVentaPersonal(){
    require "../modelo/ventaModelo.php";

    $idPersonal = $_POST["idPersonal"];
    $fecha = $_POST["fecha"];

    $data = array(
      "idPersonal" => $idPersonal,
      "fecha" => $fecha,
    );

    $respuesta = ModeloVenta::mdlVentaReporte($data);
    
    foreach ($respuesta as $value) {
?>
      <tr>
        <td><?php echo $value["codigo_factura"]; ?></td>
        <td><?php echo $value["nombre_cliente"]; ?></td>
        <td><?php echo $value["fecha_emision"]; ?></td>
        <td><?php echo $value["neto"]; ?></td>
      </tr>

    <?php
    }
    ?>
    <script>
      $(function() {
        $("#DataTable3").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
          language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
            }
          }
        }).buttons().container().appendTo('#DataTable3_wrapper .col-md-6:eq(0)');

      });
    </script>
<?php
  }
  
  static public function ctrCmbEstado(){
    require_once "../modelo/ventaModelo.php";
    $id=$_POST["idVenta"];
    $respuesta = ModeloVenta::mdlCmbEstado($id);
    echo $respuesta;
  }

  /* PARA NOTAS DE SALIDAS */
  static public function ctrRegNotaSalida()
  {
    session_start(); //inicamos la sesion para obtener el id del usuario actual
    require_once "../modelo/ventaModelo.php";

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");
    $hora = date("H-i-s");

    $data = array(
      "codSalida" => $_POST["codSalida"],
      "conceptoSalida" => $_POST["conceptoSalida"],
      /* "usuario" => $_SESSION["idUsuario"], */
      "fechaHora" => $fecha . " " . $hora,
      "productos" => $_POST["productos"],
      "totalVenta" => $_POST["totalVenta"],
      "descuentoVenta" => $_POST["descuentoVenta"],
      "netoVenta" => $_POST["netoVenta"]
    );
    $respuesta = ModeloVenta::mdlRegNotaSalida($data);
    echo $respuesta;

    /* var_dump($data); */
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
}
