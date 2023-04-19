<?php 
require_once "conexion.php";
class ModeloGrupo{


  static public function mdlInfoGrupos(){
    $stmt=Conexion::conectar()->prepare("select * from grupo");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegGrupo($data){

    $descGrupo=$data["descGrupo"];

    $stmt=Conexion::conectar()->prepare("insert into grupo(desc_grupo) values('$descGrupo')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoGrupo($id){
    $stmt=Conexion::conectar()->prepare("select * from Grupo where id_Grupo=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditGrupo($data){

    $descGrupo=$data["descGrupo"];
    $idGrupo=$data["idGrupo"];

    $stmt=Conexion::conectar()->prepare("update grupo set desc_grupo='$descGrupo' where id_grupo=$idGrupo");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliGrupo($data){
    $Grupo=Conexion::conectar()->prepare("select * from factura where id_Grupo=$data");
    $Grupo->execute();
    if($Grupo->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from Grupo where id_Grupo=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusGrupo($nitGrupo){
    $stmt=Conexion::conectar()->prepare("select * from Grupo where nit_ci_Grupo=$nitGrupo");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadGrupos(){
    $stmt=Conexion::conectar()->prepare("select count(*) as Grupo from Grupo");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}