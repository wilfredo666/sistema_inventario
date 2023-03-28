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
    /*  $personal=$data["personal"]; */
    $total = $data["totalVenta"];
    $descuento = $data["descuentoVenta"];
    $neto = $data["netoVenta"];


    $stmt = Conexion::conectar()->prepare("insert into factura(codigo_factura, id_cliente, detalle_factura, total, descuento, neto, fecha_emision, id_usuario) values('$numFactura', $idCliente, '$productos', '$total', '$descuento', '$neto', '$fechaHora', $usuario)");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegNotaEntrega($data)
  {
    $chofer = $data["chofer"];
    $vehiculo = $data["vehiculo"];
    $usuario = $data["usuario"];
    $fechaHora = $data["fechaHora"];
    $productos = $data["productos"];
    $zonaVenta = $data["zonaVenta"];


    $stmt = Conexion::conectar()->prepare("insert into nota_entrega(id_personal, id_vehiculo, id_usuario, fecha_hora_ne, detalle_ne, zona_venta) values($chofer, $vehiculo, $usuario, '$fechaHora', '$productos', '$zonaVenta')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNotasEntrega()
  {
    $stmt = Conexion::conectar()->prepare("select id_nota_entrega, nombre_usuario, nombre_personal, ap_pat_personal, fecha_hora_ne, zona_venta from nota_entrega join personal on nota_entrega.id_personal=personal.id_personal join vehiculo on nota_entrega.id_vehiculo=vehiculo.id_vehiculo join usuario on nota_entrega.id_usuario=usuario.id_usuario");

    $stmt->execute();
    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNotaEntrega($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from nota_entrega join personal on nota_entrega.id_personal=personal.id_personal join vehiculo on nota_entrega.id_vehiculo=vehiculo.id_vehiculo join usuario on nota_entrega.id_usuario=usuario.id_usuario where id_nota_entrega=$id");

    $stmt->execute();
    return $stmt->fetch();

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
/* PARA REPORTES DE INGRESO Y SALIDAS */
  static public function mdlInfoSalidas()
  {
    $stmt = Conexion::conectar()->prepare("select * from nota_salida");

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
    $stmt = Conexion::conectar()->prepare("select * from factura join cliente on cliente.id_cliente=factura.id_cliente join usuario on usuario.id_usuario=factura.id_usuario join personal on personal.id_personal=factura.id_personal where id_factura=$id");

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
  /* REVISAR PORQUE LOS CHOFERES NO TIENEN UN ACCESSO CON SESSION */
  static public function InfoVentasChofer($data)
  {

    $usuario = $data["usuario"];

    $stmt = Conexion::conectar()->prepare("select * from factura where id_personal=$usuario");

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

    $total = $data["totalVenta"];
    $descuento = $data["descuentoVenta"];
    $neto = $data["netoVenta"];


    $stmt = Conexion::conectar()->prepare("insert into nota_salida(cod_nota_salida, concepto_salida, detalle_nota_salida, fecha_salida) values('$codSalida', '$conceptoSalida', '$productos', '$fechaHora')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "n";
    }

    $stmt->close();
    $stmt->null;
  }
}
