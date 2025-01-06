<?php
require_once "conexion.php";

class ModeloVenta
{

  static public function mdlRegNotaVenta($data)
  {

    $numFactura = $data["numFactura"];
    $idCliente = $data["idCliente"];
    $usuario = $data["usuario"];
    $fechaHora = $data["fechaHora"];
    $productos = $data["productos"];
    $total = $data["totalVenta"];
    $descuento = $data["descuentoVenta"];
    $neto = $data["netoVenta"];


    $stmt = Conexion::conectar()->prepare("insert into factura(codigo_factura, id_cliente, detalle_factura, total, descuento, neto, fecha_emision, id_usuario) values('NV-$numFactura', $idCliente, '$productos', '$total', '$descuento', '$neto', '$fechaHora', $usuario)");

    if ($stmt->execute()) {
      //fecha
      date_default_timezone_set("America/La_paz");
      $fecha = date("Y-m-d");

      //transformar de json a array
      $salProductos = json_decode($data["productos"], true);

      //registrar en la bd - tabla salida stock
      for ($i = 0; $i < count($salProductos); $i++) {
        $idProducto = $salProductos[$i]["idProducto"];
        $cantProducto = $salProductos[$i]["cantProducto"];

        $salida_sql = Conexion::conectar()->prepare("insert into salida_stock(id_producto, cantidad, cod_salida) values('$idProducto', $cantProducto, 'NV-$numFactura')");
        $salida_sql->execute();
      }

      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoVentas()
  {
    $stmt = Conexion::conectar()->prepare("select * from factura
join cliente
on cliente.id_cliente=factura.id_cliente
JOIN usuario
on usuario.id_usuario=factura.id_usuario");

    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  /*====================================
 PARA REPORTES DE INGRESO Y SALIDAS 
 ====================================*/
  static public function mdlInformacionVentas()
  {
    $stmt = Conexion::conectar()->prepare("select * from factura");
    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  /* PARA REPORTES DE INGRESO Y SALIDAS */
  static public function mdlInfoSalidas()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * from venta JOIN cliente ON cliente.id_cliente=venta.id_cliente ORDER BY id_venta DESC");

    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }
  static public function mdlInfoIngresos()
  {
    $stmt = Conexion::conectar()->prepare("select * from nota_ingreso");

    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoFactura($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from factura join cliente on cliente.id_cliente=factura.id_cliente join usuario on usuario.id_usuario=factura.id_usuario where id_factura=$id");

    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlReporteVentas($fechaInicio, $fechaFinal)
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM factura WHERE fecha_emision BETWEEN '$fechaInicio' AND '$fechaFinal 23:59:59'");

    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlAnularVenta($id)
  {
    $stmt = Conexion::conectar()->prepare("update factura set estado_factura=0 where id_factura=$id");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNotaVenta($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from factura
join cliente
on cliente.id_cliente=factura.id_cliente
JOIN usuario
on usuario.id_usuario=factura.id_usuario
where id_factura=$id");

    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  /* ==============================================
CONSULTAS PARA LAS VISTAS MODAL VER DE SALIDAS E INGRESOS
====================================================*/
  static public function mdlInfoNotaIngreso($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from nota_ingreso where id_nota_ingreso=$id");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNotaSalida($id)
  {
    $stmt = Conexion::conectar()->prepare("SELECT razon_social_cliente,nit_ci_cliente,direccion_cliente,codigo_venta,detalle_venta,total,venta.descuento as decventa, cliente.descuento as descuento,neto,fecha_emision, observacion, estado_venta, id_usuario  from venta JOIN cliente ON cliente.id_cliente=venta.id_cliente where id_venta=$id ");

    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  /* --------------------------------------------- */
  static public function mdlVentaReporte($data)
  {
    $idPersonal = $data["idPersonal"];
    $fecha = $data["fecha"];

    $stmt = Conexion::conectar()->prepare("select * from factura
    JOIN cliente
ON cliente.id_cliente=factura.id_cliente
where id_personal=$idPersonal and fecha_emision BETWEEN '$fecha' AND '$fecha 23:59:59'");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlCmbEstado($id)
  {

    $stmt = Conexion::conectar()->prepare("update factura set estado_factura=1 where id_factura=$id");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  /* PARA NOTAS DE SALIDA */
  static public function mdlRegNotaSalida($data)
  {

    $codSalida = $data["codSalida"];
    $conceptoSalida = $data["conceptoSalida"];
    $fechaHora = $data["fechaHora"];
    $productos = $data["productos"];
    $usuario = $data["usuario"];

    $stmt = Conexion::conectar()->prepare("insert into nota_salida(cod_nota_salida, concepto_salida, detalle_nota_salida, fecha_salida, id_usuario) values('NS-$codSalida', '$conceptoSalida', '$productos', '$fechaHora', $usuario)");

    if ($stmt->execute()) {
      //transformar de json a array
      $salProductos = json_decode($data["productos"], true);

      //registrar en la bd - tabla salida stock
      for ($i = 0; $i < count($salProductos); $i++) {
        $idProducto = $salProductos[$i]["idProducto"];
        $cantProducto = $salProductos[$i]["cantProducto"];

        $salida_sql = Conexion::conectar()->prepare("insert into salida_stock(id_producto, cantidad, cod_salida) values($idProducto, $cantProducto, 'NS-$codSalida')");
        $salida_sql->execute();
      }

      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegNotaIngreso($data)
  {
    $codIngreso = $data["codIngreso"];
    $conceptoIngreso = $data["conceptoIngreso"];
    $usuario = $data["usuario"];
    $fechaHora = $data["fechaHora"];
    $productos = $data["productos"];


    $stmt = Conexion::conectar()->prepare("insert into nota_ingreso(cod_nota_ingreso, concepto_ingreso, detalle_ingreso, fecha_ingreso, id_usuario) values('NI-$codIngreso', '$conceptoIngreso', '$productos', '$fechaHora', $usuario)");

    if ($stmt->execute()) {

      //transformar de json a array
      $ingProductos = json_decode($data["productos"], true);

      //registrar en la bd - tabla ingreso stock
      for ($i = 0; $i < count($ingProductos); $i++) {
        $idProducto = $ingProductos[$i]["idProducto"];
        $cantProducto = $ingProductos[$i]["cantProducto"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso) values($idProducto, $cantProducto, 'NI-$codIngreso')");
        $ingreso_sql->execute();
      }

      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadVentas()
  {
    $stmt = Conexion::conectar()->prepare("select count(id_factura) as ventas from factura");

    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  /* SUMATORIA DE TOTAL VENTAS */
  static public function mdlTotalVentas()
  {
    $stmt = Conexion::conectar()->prepare("select sum(total) as totalVentas from factura where fecha_emision BETWEEN '2023-01-01' and '2023-12-31'");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  /* ========================================
  REGISTRO DE LAS NOTAS DE INGRESO POR EMPAQUE
  =========================================== */
  static public function mdlRegEmpaque($data)
  {
    $fechaEmpaque = $data["fechaEmpaque"];
    $personalEmpaque = $data["personalEmpaque"];
    $nroEmpaque = $data["nroEmpaque"];
    $observacionEmpaque = $data["observacionEmpaque"];
    $detalle = $data["detalle"];

    $stmt = Conexion::conectar()->prepare("insert into nota_empaque(id_personal, fecha_empaque, nro_comprobante_emp, observacion_empaque, detalle_empaque) values($personalEmpaque, '$fechaEmpaque', '$nroEmpaque', '$observacionEmpaque', '$detalle')");

    if ($stmt->execute()) {
      //transformar de json a array
      $detalle = json_decode($data["detalle"], true);

      for ($i = 0; $i < count($detalle); $i++) {
        $idProducto = $detalle[$i]["idProducto"];
        $nroEmpaque = $nroEmpaque;
        $cantDocena = $detalle[$i]["cantProdDocena"];
        $cantUnidad = $detalle[$i]["cantProdUnidad"];
        $cantTotalUnidades = ($cantDocena * 12) + $cantUnidad;

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso) values($idProducto, $cantTotalUnidades, '$nroEmpaque')");
        $ingreso_sql->execute();
      }
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  /* ========================================
  REGISTRO DE LAS NOTAS DE INGRESO POR DEVOLUCION
  =========================================== */
  static public function mdlRegDevolucion($data)
  {
    $fecha = $data["fecha"];
    $personal = $data["personal"];
    $nroDevolucion = $data["nroDevolucion"];
    $observacion = $data["observacion"];
    $detalle = $data["detalle"];

    $stmt = Conexion::conectar()->prepare("insert into nota_devolucion(nombre_personal, fecha_devolucion, nro_comprobante_dev, observacion_dev, detalle_devolucion) values('$personal', '$fecha', '$nroDevolucion', '$observacion', '$detalle')");

    if ($stmt->execute()) {
      //transformar de json a array
      $detalle = json_decode($data["detalle"], true);

      for ($i = 0; $i < count($detalle); $i++) {
        $idProducto = $detalle[$i]["idProducto"];
        $nroDevolucion = $nroDevolucion;
        $cantDocena = $detalle[$i]["cantProdDocena"];
        $cantUnidad = $detalle[$i]["cantProdUnidad"];
        $cantTotalUnidades = ($cantDocena * 12) + $cantUnidad;

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso) values($idProducto, $cantTotalUnidades, '$nroDevolucion')");
        $ingreso_sql->execute();
      }
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  /* ========================================
  REGISTRO DE LAS NOTAS DE INGRESO POR DEVOLUCION
  =========================================== */
  static public function mdlRegProvExterno($data)
  {

    $fecha = $data["fecha"];
    $personal = $data["personal"];
    $nroComprobante = $data["nroComprobante"];
    $observacion = $data["observacion"];
    $detalle = $data["detalle"];

    $stmt = Conexion::conectar()->prepare("insert into nota_ingreso_prov(nombre_personal, fecha_ingreso_prov, nro_comprobante_prov, observacion_ingreso_prov, detalle_ingreso_prov) values('$personal', '$fecha', '$nroComprobante', '$observacion', '$detalle')");

    if ($stmt->execute()) {
      //transformar de json a array
      $detalle = json_decode($data["detalle"], true);

      for ($i = 0; $i < count($detalle); $i++) {
        $idProducto = $detalle[$i]["idProducto"];
        $nroComprobante = $nroComprobante;
        $cantDocena = $detalle[$i]["cantProdDocena"];
        $cantUnidad = $detalle[$i]["cantProdUnidad"];
        $cantTotalUnidades = ($cantDocena * 12) + $cantUnidad;

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso) values($idProducto, $cantTotalUnidades, '$nroComprobante')");
        $ingreso_sql->execute();
      }
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  /* ========================================
  REGISTRO DE LAS NOTAS DE INGRESO POR AJUSTE DE INVENTARIOS
  =========================================== */
  static public function mdlRegAjusteInventario($data)
  {

    $fecha = $data["fecha"];
    $personal = $data["personal"];
    $nroComprobante = $data["nroComprobante"];
    $observacion = $data["observacion"];
    $detalle = $data["detalle"];

    $stmt = Conexion::conectar()->prepare("insert into nota_ingreso_ajuste(id_personal, fecha_ingreso_ajuste, nro_comprobante_ajuste, observacion_ingreso_ajuste, detalle_ingreso_ajuste) values($personal, '$fecha', '$nroComprobante', '$observacion', '$detalle')");

    if ($stmt->execute()) {
      //transformar de json a array
      $detalle = json_decode($data["detalle"], true);

      for ($i = 0; $i < count($detalle); $i++) {
        $idProducto = $detalle[$i]["idProducto"];
        $nroComprobante = $nroComprobante;
        $cantDocena = $detalle[$i]["cantProdDocena"];
        $cantUnidad = $detalle[$i]["cantProdUnidad"];
        $cantTotalUnidades = ($cantDocena * 12) + $cantUnidad;

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso) values($idProducto, $cantTotalUnidades, '$nroComprobante')");
        $ingreso_sql->execute();
      }
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  /* ========================================
  REGISTRO DE LAS NOTAS DE INGRESO POR AJUSTE DE INVENTARIOS
  =========================================== */
  static public function mdlRegOtrosIngresos($data)
  {

    $fecha = $data["fecha"];
    $personal = $data["personal"];
    $nroComprobante = $data["nroComprobante"];
    $observacion = $data["observacion"];
    $detalle = $data["detalle"];

    $stmt = Conexion::conectar()->prepare("insert into nota_otros_ingresos(id_personal, fecha_otros_ingresos, nro_comprobante_otros, observacion_otros_ingresos, detalle_otros_ingresos) values($personal, '$fecha', '$nroComprobante', '$observacion', '$detalle')");

    if ($stmt->execute()) {
      //transformar de json a array
      $detalle = json_decode($data["detalle"], true);

      for ($i = 0; $i < count($detalle); $i++) {
        $idProducto = $detalle[$i]["idProducto"];
        $nroComprobante = $nroComprobante;
        $cantDocena = $detalle[$i]["cantProdDocena"];
        $cantUnidad = $detalle[$i]["cantProdUnidad"];
        $cantTotalUnidades = ($cantDocena * 12) + $cantUnidad;

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso) values($idProducto, $cantTotalUnidades, '$nroComprobante')");
        $ingreso_sql->execute();
      }
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  /*=============================================
	MOSTRAR LAS VENTAS  PARA VER SI TENEMOS REGISTRO O NO
	=============================================*/
  static public function mdlMostrarCantVentas()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as registros from venta");
    $stmt->execute();
    return $stmt->fetchColumn();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlUltimaVenta()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM venta ORDER BY id_venta DESC");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  /* ========================================
  REGISTRO DE LAS NOTAS DE VENTAS
  =========================================== */
  static public function mdlRegistroVenta($data)
  {
    $fecha = $data["fecha"];
    $cliente = $data["cliente"];
    $nroComprobante = $data["nroComprobante"];
    $observacion = $data["observacion"];
    $detalle = $data["detalle"];
    $subTotal = $data["subTotal"];
    $totalNeto = $data["totalNeto"];
    $totalDescuento = $data["totalDescuento"];
    $usuario = $data["usuario"];

    $stmt = Conexion::conectar()->prepare("insert into venta(codigo_venta, id_cliente, detalle_venta, total, descuento, neto, fecha_emision, observacion, id_usuario) values('$nroComprobante', $cliente, '$detalle', '$subTotal', '$totalDescuento', '$totalNeto', '$fecha', '$observacion', $usuario)");

    if ($stmt->execute()) {
      //transformar de json a array
      $detalle = json_decode($data["detalle"], true);

      for ($i = 0; $i < count($detalle); $i++) {
        $idProducto = $detalle[$i]["idProducto"];
        $nroComprobante = $nroComprobante;
        $cantDocena = $detalle[$i]["cantProdDocena"];
        $cantUnidad = $detalle[$i]["cantProdUnidad"];
        $cantTotalUnidades = ($cantDocena * 12) + $cantUnidad;

        $ingreso_sql = Conexion::conectar()->prepare("insert into salida_stock(id_producto, cantidad, cod_salida) values($idProducto, $cantTotalUnidades, '$nroComprobante')");
        $ingreso_sql->execute();
      }
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRepMovimiento($data){
    var_dump($data);
/*    $stmt = Conexion::conectar()->prepare("select * from factura
join cliente
on cliente.id_cliente=factura.id_cliente
JOIN usuario
on usuario.id_usuario=factura.id_usuario");

    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;*/
  }
}
