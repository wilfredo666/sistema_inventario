<?php 
require_once "conexion.php";
class ModeloColor{


  static public function mdlInfoColores(){
    $stmt=Conexion::conectar()->prepare("select * from color");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegColor($data){

    $desColor=$data["desColor"];
    $codigoColor=$data["codigoColor"];

    $stmt=Conexion::conectar()->prepare("insert into color(desc_color, img_color) values('$desColor','$codigoColor')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoColor($id){
    $stmt=Conexion::conectar()->prepare("select * from Color where id_Color=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditColor($data){

    $desColor=$data["desColor"];
    $codigoColor=$data["codigoColor"];
    $idColor=$data["idColor"];

    $stmt=Conexion::conectar()->prepare("update color set desc_color='$desColor', img_color='$codigoColor' where id_color=$idColor");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliColor($data){
    $Color=Conexion::conectar()->prepare("select * from factura where id_Color=$data");
    $Color->execute();
    if($Color->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from Color where id_Color=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusColor($nitColor){
    $stmt=Conexion::conectar()->prepare("select * from Color where nit_ci_Color=$nitColor");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadColors(){
    $stmt=Conexion::conectar()->prepare("select count(*) as Color from Color");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}