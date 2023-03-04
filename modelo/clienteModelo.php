<?php 
require_once "conexion.php";
class ModeloCliente{


  static public function mdlInfoClientes(){
    $stmt=Conexion::conectar()->prepare("select * from cliente");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegCliente($data){

    $rzCliente=$data["rzCliente"];
    $nitCliente=$data["nitCliente"];
    $dirCliente=$data["dirCliente"];
    $nomCliente=$data["nomCliente"];
    $telCliente=$data["telCliente"];

    date_default_timezone_set('America/La_Paz');
    $fecha = date('Y-m-d');

    $stmt=Conexion::conectar()->prepare("insert into cliente(razon_social_cliente, nit_ci_cliente, direccion_cliente, nombre_cliente, telefono_cliente) values('$rzCliente', '$nitCliente', '$dirCliente', '$nomCliente', '$telCliente')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoCliente($id){
    $stmt=Conexion::conectar()->prepare("select * from cliente where id_cliente=$id");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditCliente($data){

    $rzCliente=$data["rzCliente"];
    $nitCliente=$data["nitCliente"];
    $dirCliente=$data["dirCliente"];
    $nomCliente=$data["nomCliente"];
    $telCliente=$data["telCliente"];
    $idCliente=$data["idCliente"];

    $stmt=Conexion::conectar()->prepare("update cliente set razon_social_cliente='$rzCliente', nit_ci_cliente='$nitCliente',  direccion_cliente='$dirCliente', nombre_cliente='$nomCliente', telefono_cliente='$telCliente' where id_cliente=$idCliente");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliCliente($data){
    $cliente=Conexion::conectar()->prepare("select * from factura where id_cliente=$data");
    $cliente->execute();
    if($cliente->fetch()>0){
      echo "error";
    }else{
      $stmt=Conexion::conectar()->prepare("delete from cliente where id_cliente=$data");

      if($stmt->execute()){
        return "ok";
      }else{
        return "error";
      }
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusCliente($nitCliente){
    $stmt=Conexion::conectar()->prepare("select * from cliente where nit_ci_cliente=$nitCliente");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlCantidadClientes(){
    $stmt=Conexion::conectar()->prepare("select count(*) as cliente from cliente");
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

}