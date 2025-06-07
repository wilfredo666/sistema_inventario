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
       if (!$salida_sql->execute()) {
          return "error";
        }
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

  static public function mdlInfoSalidasOtros()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * from nota_salida_otros ORDER BY id_salida_otros DESC");

    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoIngresos()
  {
    $stmt1 = Conexion::conectar()->prepare("SELECT nro_comprobante_emp as codigo, fecha_empaque as fecha, observacion_empaque as observacion, personal.nombre_personal as personal, id_nota_empaque as id
            FROM nota_empaque
            JOIN personal ON personal.id_personal=nota_empaque.id_personal");
    $stmt2 = Conexion::conectar()->prepare("SELECT nro_comprobante_dev as codigo, fecha_devolucion as fecha , observacion_dev as observacion, nombre_personal as personal, id_devolucion as id FROM nota_devolucion");
    $stmt3 = Conexion::conectar()->prepare("SELECT nro_comprobante_ajuste as codigo, fecha_ingreso_ajuste as fecha, personal.nombre_personal as personal, observacion_ingreso_ajuste as observacion, id_ingreso_ajuste as id
            FROM nota_ingreso_ajuste
            JOIN personal ON personal.id_personal=nota_ingreso_ajuste.id_personal");
    $stmt4 = Conexion::conectar()->prepare("SELECT nro_comprobante_prov as codigo, fecha_ingreso_prov as fecha, nombre_personal as personal, observacion_ingreso_prov as observacion, id_ingreso_prov as id FROM nota_ingreso_prov ");
    $stmt5 = Conexion::conectar()->prepare("SELECT nro_comprobante_otros as codigo, fecha_otros_ingresos as fecha, personal.nombre_personal as personal, observacion_otros_ingresos as observacion, id_otros_ingresos as id
            FROM nota_otros_ingresos
            JOIN personal ON personal.id_personal=nota_otros_ingresos.id_personal;");

    $stmt1->execute();
    $result1 = $stmt1->fetchAll();

    $stmt2->execute();
    $result2 = $stmt2->fetchAll();

    $stmt3->execute();
    $result3 = $stmt3->fetchAll();

    $stmt4->execute();
    $result4 = $stmt4->fetchAll();

    $stmt5->execute();
    $result5 = $stmt5->fetchAll();

    $resultadoFinal = array_merge($result1, $result2, $result3, $result4, $result5);

    $stmt1->closeCursor();
    $stmt2->closeCursor();
    $stmt3->closeCursor();
    $stmt4->closeCursor();
    $stmt5->closeCursor();

    return $resultadoFinal;
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

  static public function mdlRepMenorProd($data)
  {
    $producto = $data["producto"];
    $fechaInicial = $data["fechaInicial"];
    $fechaFinal = $data["fechaFinal"];

    //$stmt = Conexion::conectar()->prepare("SELECT * FROM salida_stock WHERE fecha_emision BETWEEN '$fechaInicial' AND '$fechaFinal'");

    /********** salidas *********/
    $stmt1 = Conexion::conectar()->prepare("SELECT cantidad, cod_salida as codigo, venta.fecha_emision as fecha FROM salida_stock JOIN venta ON salida_stock.cod_salida=venta.codigo_venta WHERE salida_stock.id_producto=$producto AND venta.fecha_emision BETWEEN '$fechaInicial' AND '$fechaFinal'");

    $stmt2 = Conexion::conectar()->prepare("SELECT cantidad, cod_salida as codigo, nota_salida_otros.fecha_salida_otros as fecha 
              FROM salida_stock 
              JOIN nota_salida_otros ON salida_stock.cod_salida=nota_salida_otros.codigo_salida_otros
              WHERE salida_stock.id_producto=$producto
              AND nota_salida_otros.fecha_salida_otros BETWEEN '$fechaInicial' AND '$fechaFinal'");

    /********** ingresos *********/
    $stmt3 = Conexion::conectar()->prepare("SELECT cantidad, cod_ingreso as codigo, nota_empaque.fecha_empaque as fecha 
            FROM ingreso_stock 
            JOIN nota_empaque ON ingreso_stock.cod_ingreso=nota_empaque.nro_comprobante_emp
            WHERE ingreso_stock.id_producto=$producto
            AND nota_empaque.fecha_empaque BETWEEN '$fechaInicial' AND '$fechaFinal'");

    $stmt4 = Conexion::conectar()->prepare("SELECT cantidad, cod_ingreso as codigo, nota_ingreso_ajuste.fecha_ingreso_ajuste as fecha 
            FROM ingreso_stock 
            JOIN nota_ingreso_ajuste ON ingreso_stock.cod_ingreso=nota_ingreso_ajuste.nro_comprobante_ajuste
            WHERE ingreso_stock.id_producto=$producto
            AND nota_ingreso_ajuste.fecha_ingreso_ajuste BETWEEN '$fechaInicial' AND '$fechaFinal'");

    $stmt5 = Conexion::conectar()->prepare("SELECT cantidad, cod_ingreso as codigo, nota_ingreso_prov.fecha_ingreso_prov as fecha 
            FROM ingreso_stock 
            JOIN nota_ingreso_prov ON ingreso_stock.cod_ingreso=nota_ingreso_prov.nro_comprobante_prov
            WHERE ingreso_stock.id_producto=$producto
            AND nota_ingreso_prov.fecha_ingreso_prov BETWEEN '$fechaInicial' AND '$fechaFinal'");

    $stmt6 = Conexion::conectar()->prepare("SELECT cantidad, cod_ingreso as codigo, nota_otros_ingresos.fecha_otros_ingresos as fecha 
            FROM ingreso_stock 
            JOIN nota_otros_ingresos ON ingreso_stock.cod_ingreso=nota_otros_ingresos.nro_comprobante_otros
            WHERE ingreso_stock.id_producto=$producto
            AND nota_otros_ingresos.fecha_otros_ingresos BETWEEN '$fechaInicial' AND '$fechaFinal'");

    $stmt7 = Conexion::conectar()->prepare("SELECT cantidad, cod_ingreso as codigo, nota_devolucion.fecha_devolucion as fecha 
            FROM ingreso_stock 
            JOIN nota_devolucion ON ingreso_stock.cod_ingreso=nota_devolucion.nro_comprobante_dev
            WHERE ingreso_stock.id_producto=$producto
            AND nota_devolucion.fecha_devolucion BETWEEN '$fechaInicial' AND '$fechaFinal';");

    $stmt1->execute();
    $result1 = $stmt1->fetchAll();

    $stmt2->execute();
    $result2 = $stmt2->fetchAll();

    $stmt3->execute();
    $result3 = $stmt3->fetchAll();

    $stmt4->execute();
    $result4 = $stmt4->fetchAll();

    $stmt5->execute();
    $result5 = $stmt5->fetchAll();

    $stmt6->execute();
    $result6 = $stmt6->fetchAll();

    $stmt7->execute();
    $result7 = $stmt7->fetchAll();

    $resultadoFinal = array_merge($result1, $result2, $result3, $result4, $result5, $result6, $result7);

    $stmt1->closeCursor();
    $stmt2->closeCursor();
    $stmt3->closeCursor();
    $stmt4->closeCursor();
    $stmt5->closeCursor();
    $stmt6->closeCursor();
    $stmt7->closeCursor();

    return $resultadoFinal;
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
  static public function mdlInfoNotaIngreso($id, $codigo)
  {
    if (strpos($codigo, 'I') === 0 || strpos($codigo, 'O') === 0) {
      $segundaLetra = substr($codigo, 1, 1);
      switch ($segundaLetra) {
        case 'I':
          $stmt = Conexion::conectar()->prepare("SELECT fecha_otros_ingresos as fecha, nro_comprobante_otros as codigo, observacion_otros_ingresos as observacion, detalle_otros_ingresos as detalle
          from nota_otros_ingresos where id_otros_ingresos=$id");
          $stmt->execute();
          return $stmt->fetch();
          $stmt->close();
          $stmt->null;
          break;
        case 'E':
          $stmt = Conexion::conectar()->prepare("SELECT fecha_empaque as fecha, nro_comprobante_emp as codigo, observacion_empaque as observacion, detalle_empaque as detalle
                  from nota_empaque where id_nota_empaque=$id");
          $stmt->execute();
          return $stmt->fetch();
          $stmt->close();
          $stmt->null;
          break;
        case 'A':
          $stmt = Conexion::conectar()->prepare("SELECT fecha_ingreso_ajuste as fecha, nro_comprobante_ajuste as codigo, observacion_ingreso_ajuste as observacion, detalle_ingreso_ajuste as detalle
                  from nota_ingreso_ajuste where id_ingreso_ajuste=$id");
          $stmt->execute();
          return $stmt->fetch();
          $stmt->close();
          $stmt->null;
          break;
        case 'P':
          $stmt = Conexion::conectar()->prepare("SELECT fecha_ingreso_prov as fecha, nro_comprobante_prov as codigo, observacion_ingreso_prov as observacion, detalle_ingreso_prov as detalle
          from nota_ingreso_prov where id_ingreso_prov=$id");
          $stmt->execute();
          return $stmt->fetch();
          $stmt->close();
          $stmt->null;
          break;
        case 'D':
          $stmt = Conexion::conectar()->prepare("SELECT fecha_devolucion as fecha, nro_comprobante_dev as codigo, observacion_dev as observacion, detalle_devolucion as detalle
          from nota_devolucion where id_devolucion=$id");
          $stmt->execute();
          return $stmt->fetch();
          $stmt->close();
          $stmt->null;
          break;
        default:
          $tipo = 'Otros';
          break;
      }
    } else {
      $tipo = 'Otros';
    }
  }

  static public function mdlInfoNotaSalida($id)
  {
    $stmt = Conexion::conectar()->prepare("SELECT razon_social_cliente,nit_ci_cliente,direccion_cliente,codigo_venta,detalle_venta,total,venta.descuento as decventa, cliente.descuento as descuento,neto,fecha_emision, observacion, estado_venta, id_usuario  from venta JOIN cliente ON cliente.id_cliente=venta.id_cliente where id_venta=$id ");

    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNotaSalidaOtros($id)
  {
    $stmt = Conexion::conectar()->prepare("SELECT * from nota_salida_otros where id_salida_otros=$id");

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
       if (!$salida_sql->execute()) {
          return "error";
        }
      }

      return "ok";

    } else {
      return "error";
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
    $fechaHora = $data["fechaHora"];

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
        $costoProducto = $detalle[$i]["costoProducto"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso, create_at, update_at, costo) values($idProducto, $cantTotalUnidades, '$nroEmpaque', '$fechaHora', '$fechaHora', '$costoProducto')");

        if (!$ingreso_sql->execute()) {
          return "error";
        }
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
    $fechaHora = $data["fechaHora"];

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
        $costoProducto = $detalle[$i]["costoProducto"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso, create_at, update_at, costo) values($idProducto, $cantTotalUnidades, '$nroDevolucion', '$fechaHora', '$fechaHora', '$costoProducto')");

         if (!$ingreso_sql->execute()) {
          return "error";
        }
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
    $fechaHora = $data["fechaHora"];

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
        $costoProducto = $detalle[$i]["costoProducto"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso, create_at, update_at, costo) values($idProducto, $cantTotalUnidades, '$nroComprobante', '$fechaHora', '$fechaHora', '$costoProducto')");

         if (!$ingreso_sql->execute()) {
          return "error";
        }
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
    $fechaHora = $data["fechaHora"];

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
        $costoProducto = $detalle[$i]["costoProducto"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso, create_at, update_at, costo) values($idProducto, $cantTotalUnidades, '$nroComprobante', '$fechaHora', '$fechaHora', '$costoProducto')");

         if (!$ingreso_sql->execute()) {
          return "error";
        }
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
    $fechaHora = $data["fechaHora"];

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
        $costoProducto = $detalle[$i]["costoProducto"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into ingreso_stock(id_producto, cantidad, cod_ingreso, create_at, update_at, costo) values($idProducto, $cantTotalUnidades, '$nroComprobante', '$fechaHora', '$fechaHora', '$costoProducto')");

         if (!$ingreso_sql->execute()) {
          return "error";
        }
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

  static public function mdlMostrarCantVentasOtros()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as registros from nota_salida_otros");
    $stmt->execute();
    return $stmt->fetchColumn();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlUltimaVentaOtros()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM nota_salida_otros ORDER BY id_salida_otros DESC");
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
    $create_at = $data["create_at"];
    $update_at = $data["update_at"];
    $usuario = $data["usuario"];

    $stmt = Conexion::conectar()->prepare("insert into venta(codigo_venta, id_cliente, detalle_venta, total, descuento, neto, fecha_emision, observacion, id_usuario, create_at, update_at) values('$nroComprobante', $cliente, '$detalle', '$subTotal', '$totalDescuento', '$totalNeto', '$fecha', '$observacion', $usuario, '$create_at', '$update_at')");

    if ($stmt->execute()) {
      //transformar de json a array
      $detalle = json_decode($data["detalle"], true);

      for ($i = 0; $i < count($detalle); $i++) {
        $idProducto = $detalle[$i]["idProducto"];
        $nroComprobante = $nroComprobante;
        $cantDocena = $detalle[$i]["cantProdDocena"];
        $cantUnidad = $detalle[$i]["cantProdUnidad"];
        $cantTotalUnidades = ($cantDocena * 12) + $cantUnidad;
        $costoProducto=$detalle[$i]["costoProducto"];
        $ingreso_sql = Conexion::conectar()->prepare("insert into salida_stock(id_producto, cantidad, cod_salida, create_at, update_at, costo) values($idProducto, $cantTotalUnidades, '$nroComprobante', '$create_at', '$update_at', '$costoProducto')");
         if (!$ingreso_sql->execute()) {
          return "error";
        }
      }

      return "ok";

    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }


  static public function mdlMontoTotalVentas()
  {
    $stmt = Conexion::conectar()->prepare("select sum(total) as totalVentas from venta");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  /* ========================================
  REGISTRO DE LAS NOTAS DE VENTAS DE OTROS COCEPTOS
  =========================================== */
  static public function mdlRegistroVentaOtros($data)
  {
    $fecha = $data["fecha"];
    $nroComprobante = $data["nroComprobante"];
    $detalle = $data["detalle"];
    $subTotal = $data["subTotal"];
    $totalDescuento = $data["totalDescuento"];
    $totalNeto = $data["totalNeto"];
    $usuario = $data["usuario"];
    $observacion = $data["observacion"];
    $concepto_salida = $data["concepto_salida"];
    $create_at = $data["create_at"];
    $update_at = $data["update_at"];

    $stmt = Conexion::conectar()->prepare("insert into nota_salida_otros(codigo_salida_otros, detalle_salida_otros, total_salida_otros, descuento_salida_otros, neto_salida_otros, fecha_salida_otros, observacion_salida_otros, id_usuario, concepto_salida_otros) values('$nroComprobante', '$detalle', '$subTotal', '$totalDescuento', '$totalNeto', '$fecha', '$observacion', $usuario, '$concepto_salida')");

    if ($stmt->execute()) {
      //transformar de json a array
      $detalle = json_decode($data["detalle"], true);

      for ($i = 0; $i < count($detalle); $i++) {
        $idProducto = $detalle[$i]["idProducto"];
        $nroComprobante = $nroComprobante;
        $cantDocena = $detalle[$i]["cantProdDocena"];
        $cantUnidad = $detalle[$i]["cantProdUnidad"];
        $cantTotalUnidades = ($cantDocena * 12) + $cantUnidad;
        $costoProducto=$detalle[$i]["costoProducto"];

        $ingreso_sql = Conexion::conectar()->prepare("insert into salida_stock(id_producto, cantidad, cod_salida, create_at, update_at, costo) values($idProducto, $cantTotalUnidades, '$nroComprobante', '$create_at', '$update_at', '$costoProducto')");
         if (!$ingreso_sql->execute()) {
          return "error";
        }
      }

      return "ok";

    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliNotaIngreso($id, $codigo){
    if (strpos($codigo, 'I') === 0 || strpos($codigo, 'O') === 0) {
      $segundaLetra = substr($codigo, 1, 1);
      switch ($segundaLetra) {
        case 'I': //tabla: nota_otros_ingresos
          $stmt = Conexion::conectar()->prepare("DELETE FROM nota_otros_ingresos WHERE id_otros_ingresos=$id");
          if($stmt->execute()){
            return "ok";
          }else{
            return "error";
          }
          break;
        case 'E':
          $stmt = Conexion::conectar()->prepare("DELETE FROM nota_empaque WHERE id_nota_empaque=$id");
          if($stmt->execute()){
            return "ok";
          }else{
            return "error";
          }
          break;
        case 'A':
          $stmt = Conexion::conectar()->prepare("DELETE FROM nota_ingreso_ajuste WHERE id_ingreso_ajuste=$id");
          if($stmt->execute()){
            return "ok";
          }else{
            return "error";
          }
          break;
        case 'P':
          $stmt = Conexion::conectar()->prepare("DELETE FROM nota_ingreso_prov WHERE id_ingreso_prov=$id");
          if($stmt->execute()){
            return "ok";
          }else{
            return "error";
          }
          break;
        case 'D':
          $stmt = Conexion::conectar()->prepare("DELETE FROM nota_devolucion WHERE id_devolucion=$id");
          if($stmt->execute()){
            return "ok";
          }else{
            return "error";
          }
          break;
        default:
          $tipo = 'Otros';
          break;
      }
    } else {
      $tipo = 'Otros';
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliNotaSalidaOtros($id){
    $stmt = Conexion::conectar()->prepare("DELETE FROM nota_salida_otros WHERE id_salida_otros=$id");
    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
  }
}
