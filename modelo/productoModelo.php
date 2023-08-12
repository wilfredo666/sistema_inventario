<?php 
require_once "conexion.php";
class ModeloProducto{


  static public function mdlInfoProductos(){
    $stmt=Conexion::conectar()->prepare("select * from producto join talla on producto.id_talla=talla.id_talla");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }
  

  static public function mdlTotProducto($id){
    //$totFactura=Conexion::conectar()->prepare("select ")
  }

  static public function mdlRegProducto($data){
    $codProducto=$data["codProducto"];
    $nomProducto=$data["nomProducto"];
    $costoProducto=$data["costoProducto"];
    $precioProducto=$data["precioProducto"];
    $tallaProducto=$data["tallaProducto"];
    $grupoProducto=$data["grupoProducto"];
    $disenoProducto=$data["disenoProducto"];
    $categoriaProducto=$data["categoriaProducto"];
    $medidaProducto=$data["medidaProducto"];
    $colorProducto=$data["colorProducto"];
    $imgProducto=$data["imgProducto"];

    $stmt=Conexion::conectar()->prepare("insert into producto(cod_producto, nombre_producto, precio_costo, precio_venta, imagen_producto, id_grupo, id_diseno, id_categoria, id_medida, id_talla, id_color)values('$codProducto', '$nomProducto', '$costoProducto', '$precioProducto', '$imgProducto' , '$grupoProducto', '$disenoProducto', '$categoriaProducto',' $medidaProducto','$tallaProducto','$colorProducto')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoProducto($id){
    $stmt=Conexion::conectar()->prepare(
      "select * from producto 
      left join unidad_medida on unidad_medida.id_medida=producto.id_medida 
      left join talla on talla.id_talla=producto.id_talla
      left join color on color.id_color=producto.id_color
      left join grupo on grupo.id_grupo=producto.id_grupo
      left join diseno on diseno.id_diseno=producto.id_diseno
      where id_producto=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditProducto($data){

    $idProducto=$data["idProducto"];
    $codProducto=$data["codProducto"];
    $nomProducto=$data["nomProducto"];
    $costoProducto=$data["costoProducto"];
    $precioProducto=$data["precioProducto"];
    $tallaProducto=$data["tallaProducto"];
    $grupoProducto=$data["grupoProducto"];
    $disenoProducto=$data["disenoProducto"];
    $categoriaProducto=$data["categoriaProducto"];
    $medidaProducto=$data["medidaProducto"];
    $colorProducto=$data["colorProducto"];
    $ImgProducto=$data["ImgProducto"];
    $estadoProducto=$data["estadoProducto"];


    $stmt=Conexion::conectar()->prepare("update producto set cod_producto='$codProducto', nombre_producto='$nomProducto', precio_costo='$costoProducto', precio_venta='$precioProducto', imagen_producto='$ImgProducto', id_grupo='$grupoProducto' , id_diseno='$disenoProducto', id_categoria='$categoriaProducto', id_medida='$medidaProducto', id_talla='$tallaProducto', id_color='$colorProducto', estado='$estadoProducto' where id_producto=$idProducto");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlActualizarAcceso($fechaHora, $id){

    $stmt=Conexion::conectar()->prepare("update Producto set ultimo_login='$fechaHora' where id_Producto=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliProducto($id){
    try{
      $stmt = Conexion::conectar()->prepare("delete from producto where id_producto=$id");
      $stmt->execute();

    }catch (PDOException $e){
      $codeError= $e->getCode();
      if($codeError=="23000"){
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusProducto($idProducto){
    $stmt=Conexion::conectar()->prepare("select * from producto where id_producto='$idProducto'");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadProductos(){
    $stmt=Conexion::conectar()->prepare("select count(*) as producto from producto");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoProductosVenta(){
    $stmt=Conexion::conectar()->prepare("select * from producto where estado=1");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }


}