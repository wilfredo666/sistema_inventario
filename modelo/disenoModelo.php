<?php 
require_once "conexion.php";
class ModeloDiseno{


  static public function mdlInfoDisenos(){
    $stmt=Conexion::conectar()->prepare("select * from diseno");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegDiseno($data){

    $descDiseno=$data["descDiseno"];

    $stmt=Conexion::conectar()->prepare("insert into diseno(desc_diseno) values('$descDiseno')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoDiseno($id){
    $stmt=Conexion::conectar()->prepare("select * from Diseno where id_Diseno=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditDiseno($data){

    $descDiseno=$data["descDiseno"];
    $idDiseno=$data["idDiseno"];

    $stmt=Conexion::conectar()->prepare("update diseno set desc_diseno='$descDiseno' where id_diseno=$idDiseno");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliDiseno($data){
    $Diseno=Conexion::conectar()->prepare("select * from factura where id_Diseno=$data");
    $Diseno->execute();
    if($Diseno->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from Diseno where id_Diseno=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusDiseno($nitDiseno){
    $stmt=Conexion::conectar()->prepare("select * from Diseno where nit_ci_Diseno=$nitDiseno");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadDisenos(){
    $stmt=Conexion::conectar()->prepare("select count(*) as Diseno from Diseno");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}