<?php 
require_once "conexion.php";
class ModeloProvInterno{
  static public function mdlInfoProvInternos(){
    $stmt=Conexion::conectar()->prepare("select * from registro_empaque 
    join producto on producto.id_producto=registro_empaque.id_producto 
    join talla on talla.id_talla=registro_empaque.id_talla 
    join color on color.id_color=registro_empaque.id_color");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegEmpaque($data){
    $producto=$data["producto"];
    $talla=$data["talla"];
    $color=$data["color"];
    $docenas=$data["docenas"];
    $unidades=$data["unidades"];
    $personal=$data["personal"];

    $stmt=Conexion::conectar()->prepare("insert into registro_empaque(id_producto, id_talla, id_color, docenas, unidades, id_encargado)values($producto, $talla, $color, $docenas, $unidades, $personal)");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoProvInterno($id){
    $stmt=Conexion::conectar()->prepare(
      "select * from registro_empaque 
      left join talla on talla.id_talla=registro_empaque.id_talla
      left join color on color.id_color=registro_empaque.id_color
      where id_entrega=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditProvInterno($data){

    $idEntrega=$data["idEntrega"];
    $producto=$data["producto"];
    $talla=$data["talla"];
    $color=$data["color"];
    $docenas=$data["docenas"];
    $unidades=$data["unidades"];


    $stmt=Conexion::conectar()->prepare("update registro_empaque set id_producto='$producto', id_talla='$talla', id_color='$color', docenas='$docenas', unidades='$unidades' where id_entrega=$idEntrega");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliProvInterno($id){
    try{
      $stmt = Conexion::conectar()->prepare("delete from registro_empaque where id_entrega=$id");
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
}