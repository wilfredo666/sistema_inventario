<td id="estadoFactura_<?php echo $value["id_factura"]; ?>">
    <?php
    if ($value["estado_factura"] == 1) {
    ?>
        <span class="badge badge-success">Emitido</span>
    <?php
    } else if ($value["estado_factura"] == 2) {
    ?>
        <button type="button" class="btn btn-block btn-warning btn-xs" onclick="cmbEstadoVenta(<?php echo $value["id_factura"] ?>)">Pendiente</button>
    <?php
    } else {
    ?>
        <span class="badge badge-danger">Anulado</span>
    <?php
    } ?>
</td>

<?php


//de ventaModelo.php
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

//de productoModelo.php
  static public function mdlDetalleSalidaPro($tabla, $cod, $id){

    switch($tabla){
      case "nota_salida_otros":
        $stmt = Conexion::conectar()->prepare("SELECT cod_salida, id_producto, cantidad, detalle_salida_otros, observacion_salida_otros, fecha_salida_otros FROM salida_stock JOIN nota_salida_otros ON nota_salida_otros.codigo_salida_otros=salida_stock.cod_salida WHERE cod_salida='$cod' AND id_producto=$id");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        break;
      case "venta":
        $stmt = Conexion::conectar()->prepare("SELECT cod_salida, id_producto, cantidad, detalle_venta, observacion, fecha_emision FROM salida_stock JOIN venta ON venta.codigo_venta=salida_stock.cod_salida WHERE cod_salida='$cod' AND id_producto=$id");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        break;
    }

    /*$stmt->close();
    $stmt->null;*/

  }

//de productoModelo.php
  static public function mdlDetalleIngresoPro($tabla, $cod, $id){
    switch($tabla){
      case "nota_empaque":
        $stmt = Conexion::conectar()->prepare("SELECT cod_ingreso, id_producto, cantidad, detalle_empaque, observacion_empaque, fecha_empaque FROM ingreso_stock JOIN nota_empaque ON nota_empaque.nro_comprobante_emp =ingreso_stock.cod_ingreso WHERE cod_ingreso='$cod' AND id_producto=$id");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        break;
      case "nota_ingreso"://ojo empezar agregar el producto para evitar repetidos
        $stmt = Conexion::conectar()->prepare("SELECT cod_ingreso, id_producto, cantidad, detalle_ingreso, concepto_ingreso, fecha_ingreso FROM ingreso_stock JOIN nota_ingreso ON nota_ingreso.cod_nota_ingreso=ingreso_stock.cod_ingreso WHERE cod_ingreso='$cod' AND id_producto=$id");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        break;
    }

    /*    $stmt->close();
    $stmt->null;*/
  }
  

?>