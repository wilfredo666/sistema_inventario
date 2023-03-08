<?php 
require_once "conexion.php";
class ModeloMedida{


  static public function mdlInfoMedidas(){
    $stmt=Conexion::conectar()->prepare("select * from unidad_medida");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegMedida($data){

    $descMedida=$data["descMedida"];

    $stmt=Conexion::conectar()->prepare("insert into unidad_medida(desc_medida) values('$descMedida')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoMedida($id){
    $stmt=Conexion::conectar()->prepare("select * from unidad_medida where id_medida=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditMedida($data){

    $descMedida=$data["descMedida"];
    $idMedida=$data["idMedida"];

    $stmt=Conexion::conectar()->prepare("update unidad_medida set desc_medida='$descMedida' where id_medida=$idMedida");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliMedida($data){
    $Medida=Conexion::conectar()->prepare("select * from factura where id_Medida=$data");
    $Medida->execute();
    if($Medida->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from unidad_medida where id_Medida=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusMedida($nitMedida){
    $stmt=Conexion::conectar()->prepare("select * from unidad_medida where nit_ci_Medida=$nitMedida");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadMedidas(){
    $stmt=Conexion::conectar()->prepare("select count(*) as unidad_medida from Medida");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}