<?php
require_once "conexion.php";
class ModeloProducto
{


  static public function mdlInfoProductos()
  {
    $stmt = Conexion::conectar()->prepare("SELECT producto.id_producto, cod_producto, nombre_producto, precio_costo, precio_venta, desc_talla, docenas, unidades, producto.estado FROM producto LEFT JOIN unidad_medida ON unidad_medida.id_medida = producto.id_medida LEFT JOIN stock_producto ON stock_producto.id_producto = producto.id_producto LEFT JOIN talla ON talla.id_talla = producto.id_talla");
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultado;
  }


  static public function mdlTotProducto($id)
  {
    //$totFactura=Conexion::conectar()->prepare("select ")
  }

  static public function mdlRegProducto($data)
  {
    $codProducto = $data["codProducto"];
    $nomProducto = $data["nomProducto"];
    $costoProducto = $data["costoProducto"];
    $precioProducto = $data["precioProducto"];
    $tallaProducto = $data["tallaProducto"];
    $grupoProducto = $data["grupoProducto"];
    $disenoProducto = $data["disenoProducto"];
    $categoriaProducto = $data["categoriaProducto"];
    $medidaProducto = $data["medidaProducto"];
    $colorProducto = $data["colorProducto"];
    $imgProducto = $data["imgProducto"];

    $stmt = Conexion::conectar()->prepare("insert into producto(cod_producto, nombre_producto, precio_costo, precio_venta, imagen_producto, id_grupo, id_diseno, id_categoria, id_medida, id_talla, id_color)values('$codProducto', '$nomProducto', '$costoProducto', '$precioProducto', '$imgProducto' , '$grupoProducto', '$disenoProducto', '$categoriaProducto',' $medidaProducto','$tallaProducto','$colorProducto')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoProducto($id)
  {
    $stmt = Conexion::conectar()->prepare(
      "SELECT cod_producto,desc_color,desc_diseno,desc_grupo,desc_medida,desc_talla,estado,id_categoria,color.id_color,diseno.id_diseno,grupo.id_grupo,unidad_medida.id_medida,producto.id_producto,talla.id_talla,imagen_producto,img_color,nombre_producto,precio_costo,precio_venta, diferencia, docenas, unidades FROM producto left join unidad_medida on unidad_medida.id_medida=producto.id_medida left join talla on talla.id_talla=producto.id_talla left join color on color.id_color=producto.id_color left join grupo on grupo.id_grupo=producto.id_grupo left join diseno on diseno.id_diseno=producto.id_diseno left join stock_producto on stock_producto.id_producto=producto.id_producto where producto.id_producto=$id"
    );
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditProducto($data)
  {

    $idProducto = $data["idProducto"];
    $codProducto = $data["codProducto"];
    $nomProducto = $data["nomProducto"];
    $costoProducto = $data["costoProducto"];
    $precioProducto = $data["precioProducto"];
    $tallaProducto = $data["tallaProducto"];
    $grupoProducto = $data["grupoProducto"];
    $disenoProducto = $data["disenoProducto"];
    $categoriaProducto = $data["categoriaProducto"];
    $medidaProducto = $data["medidaProducto"];
    $colorProducto = $data["colorProducto"];
    $ImgProducto = $data["ImgProducto"];
    $estadoProducto = $data["estadoProducto"];


    $stmt = Conexion::conectar()->prepare("update producto set cod_producto='$codProducto', nombre_producto='$nomProducto', precio_costo='$costoProducto', precio_venta='$precioProducto', imagen_producto='$ImgProducto', id_grupo='$grupoProducto' , id_diseno='$disenoProducto', id_categoria='$categoriaProducto', id_medida='$medidaProducto', id_talla='$tallaProducto', id_color='$colorProducto', estado='$estadoProducto' where id_producto=$idProducto");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlActualizarAcceso($fechaHora, $id)
  {

    $stmt = Conexion::conectar()->prepare("update Producto set ultimo_login='$fechaHora' where id_Producto=$id");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliProducto($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from producto where id_producto=$id");
      $stmt->execute();
    } catch (PDOException $e) {
      $codeError = $e->getCode();
      if ($codeError == "23000") {
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusProducto($idProducto)
  {
    $stmt = Conexion::conectar()->prepare("select * from producto 
          left join unidad_medida on unidad_medida.id_medida=producto.id_medida 
      left join talla on talla.id_talla=producto.id_talla
      left join color on color.id_color=producto.id_color
      left join grupo on grupo.id_grupo=producto.id_grupo
      left join diseno on diseno.id_diseno=producto.id_diseno
      where id_producto='$idProducto'");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadProductos()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as producto from producto");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoProductosVenta()
  {
    $stmt = Conexion::conectar()->prepare("select * from producto where estado=1");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  /*=============================================
	MOSTRAR NOTA DE EMPAQUES
	=============================================*/
  static public function mdlMostrarNotaEmpaque()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as empaque from nota_empaque");
    $stmt->execute();

    return $stmt->fetchColumn();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlMostrarUltimaNE()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM nota_empaque ORDER BY id_nota_empaque DESC");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* STOCK PRODUCTO */
  static public function mdlStockProducto($id)
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM stock_producto WHERE id_producto=$id");
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->close();
    $stmt->null;
  }

  /*=============================================
	MOSTRAR LAS DEVOLUCIONES PARA VER SI TENEMOS REGISTRO O NO
	=============================================*/
  static public function mdlMostrarDevolucion()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as devolucion from nota_devolucion");
    $stmt->execute();
    return $stmt->fetchColumn();
    $stmt->close();
    $stmt->null;
  }
  static public function mdlMostrarUltimaND()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM nota_devolucion ORDER BY id_devolucion DESC");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  /*=============================================
	MOSTRAR LOS ING PROVEEDORES EXTERNOS PARA VER SI TENEMOS REGISTRO O NO
	=============================================*/
  static public function mdlMostrarIngProv()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as registros from nota_ingreso_prov");
    $stmt->execute();
    return $stmt->fetchColumn();
    $stmt->close();
    $stmt->null;
  }
  static public function mdlMostrarUltimaNPE()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM nota_ingreso_prov ORDER BY id_ingreso_prov DESC");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  /*=============================================
	MOSTRAR LOS ING POR AJUSTE DE INVENTARIOS PARA VER SI TENEMOS REGISTRO O NO
	=============================================*/
  static public function mdlMostrarIngAjuste()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as registros from nota_ingreso_ajuste");
    $stmt->execute();
    return $stmt->fetchColumn();
    $stmt->close();
    $stmt->null;
  }
  static public function mdlMostrarUltimaNIA()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM nota_ingreso_ajuste ORDER BY id_ingreso_ajuste DESC");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  /*=============================================
	MOSTRAR LOS OTROS INGRESOS DE INVENTARIOS PARA VER SI TENEMOS REGISTRO O NO
	=============================================*/
  static public function mdlMostrarOtrosIng()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as registros from nota_otros_ingresos");
    $stmt->execute();
    return $stmt->fetchColumn();
    $stmt->close();
    $stmt->null;
  }
  static public function mdlMostrarUltimaNOtrosIng()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM nota_otros_ingresos ORDER BY id_otros_ingresos DESC");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoIngSalProducto($fechaInicial, $fechaFinal, $id){
    $stmt = Conexion::conectar()->prepare("(SELECT cantidad, codigo, movimiento, costo, create_at, concepto 
 FROM ingreso_producto 
 WHERE id_producto = $id 
 AND create_at BETWEEN '$fechaInicial 01:00:00' AND '$fechaFinal 23:59:59')
UNION
(SELECT cantidad, codigo, movimiento, costo, create_at, concepto  
 FROM salida_producto 
 WHERE id_producto = $id 
 AND create_at BETWEEN '$fechaInicial 01:00:00' AND '$fechaFinal 23:59:59')");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlSaldoProducto($fecha, $id){
    $stmt = Conexion::conectar()->prepare("(SELECT cantidad, costo, create_at, movimiento 
 FROM ingreso_producto 
 WHERE id_producto = $id 
 AND create_at BETWEEN '2018-01-01 01:00:00' AND '$fecha 23:59:59')
UNION
(SELECT cantidad, costo, create_at, movimiento  
 FROM salida_producto 
 WHERE id_producto = $id 
 AND create_at BETWEEN '2018-01-01 01:00:00' AND '$fecha 23:59:59')");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

}
