<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegProducto" ||
    $ruta["query"] == "ctrInfoProductos" ||
    $ruta["query"] == "ctrEditProducto" ||
    $ruta["query"] == "ctrEliProducto" ||
    $ruta["query"] == "ctrRepClasificacion" ||
    $ruta["query"] == "ctrBuscarProducto" ||
    $ruta["query"] == "ctrKardexFisico" ||
    $ruta["query"] == "ctrBusProducto"
  ) {
    $metodo = $ruta["query"];
    $producto = new ControladorProducto();
    $producto->$metodo();
  }
}


class ControladorProducto
{

  static public function ctrInfoProductos()
  {
    $respuesta = ModeloProducto::mdlInfoProductos();
    return $respuesta;
  }

  static public function ctrRegProducto()
  {
    require "../modelo/productoModelo.php";

    $imagen = $_FILES["ImgProducto"];

    $nomImagen = $imagen["name"];
    $archImagen = $imagen["tmp_name"];

    move_uploaded_file($archImagen, "../assest/dist/img/productos/" . $nomImagen);

    $data = array(
      "codProducto" => $_POST["codProducto"],
      "nomProducto" => $_POST["nomProducto"],
      "costoProducto" => $_POST["costoProducto"],
      "precioProducto" => $_POST["precioProducto"],
      "grupoProducto" => $_POST["grupoProducto"],
      "disenoProducto" => $_POST["disenoProducto"],
      "tallaProducto" => $_POST["tallaProducto"],
      "categoriaProducto" => $_POST["categoriaProducto"],
      "medidaProducto" => $_POST["medidaProducto"],
      "colorProducto" => $_POST["colorProducto"],
      "imgProducto" => $nomImagen,
    );

    $respuesta = ModeloProducto::mdlRegProducto($data);

    echo $respuesta;
  }

  static public function ctrInfoProducto($id)
  {
    $respuesta = ModeloProducto::mdlInfoProducto($id);
    return $respuesta;
  }

  static public function ctrEditProducto()
  {
    require "../modelo/productoModelo.php";
    $imgProdActual = $_POST["imgActProducto"];

    $imgProducto = $_FILES["ImgProducto"];

    if ($imgProducto["name"] == "") {
      $imagen = $imgProdActual;
    } else {

      $imagen = $imgProducto["name"];
      $archImagen = $imgProducto["tmp_name"];

      move_uploaded_file($archImagen, "../assest/dist/img/productos/" . $imagen);
    }

    $data = array(
      "idProducto" => $_POST["idProducto"],
      "codProducto" => $_POST["codProducto"],
      "nomProducto" => $_POST["nomProducto"],
      "costoProducto" => $_POST["costoProducto"],
      "precioProducto" => $_POST["precioProducto"],
      "tallaProducto" => $_POST["tallaProducto"],
      "categoriaProducto" => $_POST["categoriaProducto"],
      "grupoProducto" => $_POST["grupoProducto"],
      "disenoProducto" => $_POST["disenoProducto"],
      "medidaProducto" => $_POST["medidaProducto"],
      "colorProducto" => $_POST["colorProducto"],
      "ImgProducto" => $imagen,
      "estadoProducto" => $_POST["estadoProducto"]
    );

    $respuesta = ModeloProducto::mdlEditProducto($data);

    echo $respuesta;
  }

  static public function ctrEliProducto()
  {
    require "../modelo/productoModelo.php";
    $data = $_POST["id"];

    $respuesta = ModeloProducto::mdlEliProducto($data);

    echo $respuesta;
  }

  static public function ctrBusProducto()
  {
    require "../modelo/productoModelo.php";
    $idProducto = $_POST["idProducto"];

    $respuesta = ModeloProducto::mdlBusProducto($idProducto);

    echo json_encode($respuesta);
  }

  static public function ctrCantidadProductos()
  {
    $respuesta = ModeloProducto::mdlCantidadProductos();
    return $respuesta;
  }

  static public function ctrInfoProductosVenta()
  {
    $respuesta = ModeloProducto::mdlInfoProductosVenta();

    return $respuesta;
  }

  static public function ctrRepClasificacion()
  {
    $categoriaProducto = $_POST["categoriaProducto"];
    $color = $_POST["color"];
    $diseno = $_POST["diseno"];
    $grupo = $_POST["grupo"];
    $talla = $_POST["talla"];

    var_dump($diseno);
    var_dump($grupo);
    var_dump($talla);
    var_dump($color);
    var_dump($categoriaProducto);
  }

  static public function ctrBuscarProducto()
  {
    require "../modelo/productoModelo.php";
    $data = $_POST["id"];
    $respuesta = ModeloProducto::mdlInfoProducto($data);
    /* var_dump($respuesta); */
    echo json_encode($respuesta);
  }

  /*=============================================
	MOSTRAR NOTA DE EMPAQUES
	=============================================*/
  static public function ctrMostrarNotaEmpaque()
  {
    $tabla = "nota_empaque";
    $respuesta = ModeloProducto::mdlMostrarNotaEmpaque();
    return $respuesta;
  }

  static public function ctrMostrarUltimaNE()
  {
    $respuesta = ModeloProducto::mdlMostrarUltimaNE();
    return $respuesta;
  }

  /*======================================
   INGRESO DE stock producto 
   =======================================*/
  static public function ctrStockProducto($id)
  {
    $respuesta = ModeloProducto::mdlStockProducto($id);
    return $respuesta;
  }

  /*=============================================
	MOSTRAR DEVOLUCIONES DE PRODUCTOS
	=============================================*/
  static public function ctrMostrarDevolucion()
  {
    $respuesta = ModeloProducto::mdlMostrarDevolucion();
    return $respuesta;
  }

  static public function ctrMostrarUltimaND()
  {
    $respuesta = ModeloProducto::mdlMostrarUltimaND();
    return $respuesta;
  }

  /*=============================================
	MOSTRAR NOTA DE INGRESO POR PROVEEDORES EXTERNOS
	=============================================*/
  static public function ctrMostrarIngProv()
  {
    $respuesta = ModeloProducto::mdlMostrarIngProv();
    return $respuesta;
  }

  static public function ctrMostrarUltimaNPE()
  {
    $respuesta = ModeloProducto::mdlMostrarUltimaNPE();
    return $respuesta;
  }
  /*=============================================
	MOSTRAR NOTA DE INGRESO POR AJUSTE DE INVENTARIOS
	=============================================*/
  static public function ctrMostrarIngAjuste()
  {
    $respuesta = ModeloProducto::mdlMostrarIngAjuste();
    return $respuesta;
  }

  static public function ctrMostrarUltimaNIA()
  {
    $respuesta = ModeloProducto::mdlMostrarUltimaNIA();
    return $respuesta;
  }

  /*=============================================
	MOSTRAR NOTA DE OTROS INGRESOS
	=============================================*/
  static public function ctrMostrarOtrosIng()
  {
    $respuesta = ModeloProducto::mdlMostrarOtrosIng();
    return $respuesta;
  }

  static public function ctrMostrarUltimaNOtrosIng()
  {
    $respuesta = ModeloProducto::mdlMostrarUltimaNOtrosIng();
    return $respuesta;
  }

  static public function ctrSaldoProducto($fecha, $id){
    //restando 1 dia a la fecha indicada
    $fecha=date_create($fecha);
    date_sub($fecha, date_interval_create_from_date_string('1 days'));
    $fecha=date_format($fecha, 'Y-m-d');
    
    $respuesta = ModeloProducto::mdlSaldoProducto($fecha, $id);
    return $respuesta;
  }

  static public function ctrKardexFisico($fechaInicial, $fechaFinal, $id){
    //todas las entradas y salidas de salida_stock y ingreso_stock
    $respuesta = ModeloProducto::mdlInfoIngSalProducto($fechaInicial, $fechaFinal, $id);

    return $respuesta;

  }
}
