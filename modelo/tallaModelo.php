<?php 
require_once "conexion.php";
class ModeloTalla{


  static public function mdlInfoTallas(){
    $stmt=Conexion::conectar()->prepare("select * from talla");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegTalla($data){

    $descTalla=$data["descTalla"];

    $stmt=Conexion::conectar()->prepare("insert into talla(desc_talla) values('$descTalla')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoTalla($id){
    $stmt=Conexion::conectar()->prepare("select * from talla where id_talla=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditTalla($data){

    $descTalla=$data["descTalla"];
    $idTalla=$data["idTalla"];

    $stmt=Conexion::conectar()->prepare("update talla set desc_talla='$descTalla' where id_talla=$idTalla");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliTalla($data){
  /*  $Talla=Conexion::conectar()->prepare("select * from factura where id_talla=$data");
    $Talla->execute();
    if($Talla->fetch()>0){
      echo "error";
    }else{
      }*/
      $stmt=Conexion::conectar()->prepare("delete from talla where id_talla=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusTalla($nitTalla){
    $stmt=Conexion::conectar()->prepare("select * from Talla where nit_ci_talla=$nitTalla");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadTallas(){
    $stmt=Conexion::conectar()->prepare("select count(*) as Talla from talla");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}