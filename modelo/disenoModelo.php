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
    $stmt=Conexion::conectar()->prepare("select * from diseno where id_diseno=$id");
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
/*    $Diseno=Conexion::conectar()->prepare("select * from factura where id_diseno=$data");
    $Diseno->execute();
    if($Diseno->fetch()>0){
      echo "error";
    }else{}*/
      $stmt=Conexion::conectar()->prepare("delete from diseno where id_diseno=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusDiseno($nitDiseno){
    $stmt=Conexion::conectar()->prepare("select * from diseno where nit_ci_diseno=$nitDiseno");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadDisenos(){
    $stmt=Conexion::conectar()->prepare("select count(*) as diseno from diseno");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}