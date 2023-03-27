<?php 
require_once "conexion.php";
class ModeloProveedor{


  static public function mdlInfoProveedors(){
    $stmt=Conexion::conectar()->prepare("select * from proveedor");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegProveedor($data){

    $rzProveedor=$data["rzProveedor"];
    $nitProveedor=$data["nitProveedor"];
    $dirProveedor=$data["dirProveedor"];
    $telProveedor=$data["telProveedor"];
    $emailProveedor=$data["emailProveedor"];
    $urlProveedor=$data["urlProveedor"];

    date_default_timezone_set('America/La_Paz');
    $fecha = date('Y-m-d');

    $stmt=Conexion::conectar()->prepare("insert into proveedor(rs_proveedor, nit_proveedor, direccion_prov, telefono_prov, email_proveedor, url_proveedor) values('$rzProveedor', '$nitProveedor', '$dirProveedor', '$telProveedor', '$emailProveedor', '$urlProveedor')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoProveedor($id){
    $stmt=Conexion::conectar()->prepare("select * from proveedor where id_proveedor=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditProveedor($data){

    $rzProveedor=$data["rzProveedor"];
    $nitProveedor=$data["nitProveedor"];
    $dirProveedor=$data["dirProveedor"];
    $telProveedor=$data["telProveedor"];
    $idProveedor=$data["idProveedor"];
    $emailProveedor=$data["emailProveedor"];
    $urlProveedor=$data["urlProveedor"];
    $estadoProveedor=$data["estadoProveedor"];

    $stmt=Conexion::conectar()->prepare("update proveedor set rs_proveedor='$rzProveedor', nit_proveedor='$nitProveedor',  direccion_prov='$dirProveedor', telefono_prov='$telProveedor', email_proveedor='$emailProveedor', url_proveedor='$urlProveedor', estado_proveedor='$estadoProveedor' where id_proveedor=$idProveedor");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliProveedor($data){
    $Proveedor=Conexion::conectar()->prepare("select * from factura where id_Proveedor=$data");
    $Proveedor->execute();
    if($Proveedor->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from Proveedor where id_Proveedor=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusProveedor($nitProveedor){
    $stmt=Conexion::conectar()->prepare("select * from Proveedor where nit_ci_Proveedor=$nitProveedor");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadProveedors(){
    $stmt=Conexion::conectar()->prepare("select count(*) as Proveedor from Proveedor");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}