<?php 
require_once "conexion.php";
class ModeloPersonal{


  static public function mdlInformacionPersonal(){
    $stmt=Conexion::conectar()->prepare("select * from personal");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegPersonal($data){
    $nomPersonal=$data["nomPersonal"];
    $patPersonal=$data["patPersonal"];
    $matPersonal=$data["matPersonal"];
    $ciPersonal=$data["ciPersonal"];
    $nacPersonal=$data["nacPersonal"];
    $cargoPersonal=$data["cargoPersonal"];
    $telPersonal=$data["telPersonal"];
    $dirPersonal=$data["dirPersonal"];

    $stmt=Conexion::conectar()->prepare("insert into personal(nombre_personal, ap_pat_personal, ap_mat_personal, ci_personal, nacimiento_personal, cargo_personal, direccion_personal, contactos_personal) values('$nomPersonal', '$patPersonal', '$matPersonal', '$ciPersonal',  '$nacPersonal', '$cargoPersonal', '$dirPersonal', '$telPersonal')");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoPersonal($id){
    $stmt=Conexion::conectar()->prepare("select * from personal where id_personal=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditPersonal($data){
    $idPersonal=$data["idPersonal"];
    $nomPersonal=$data["nomPersonal"];
    $patPersonal=$data["patPersonal"];
    $matPersonal=$data["matPersonal"];
    $ciPersonal=$data["ciPersonal"];
    $nacPersonal=$data["nacPersonal"];
    $cargoPersonal=$data["cargoPersonal"];
    $telPersonal=$data["telPersonal"];
    $dirPersonal=$data["dirPersonal"];
    $estadoPersonal=$data["estadoPersonal"];

    $stmt=Conexion::conectar()->prepare("update personal set nombre_personal='$nomPersonal', ap_pat_personal='$patPersonal',  ap_mat_personal='$matPersonal', ci_personal='$ciPersonal', nacimiento_personal='$nacPersonal', cargo_personal='$cargoPersonal', direccion_personal='$dirPersonal', contactos_personal='$telPersonal', estado_personal='$estadoPersonal' where id_personal=$idPersonal");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliPersonal($id){
    try{
      $personal=Conexion::conectar()->prepare("delete from personal where id_personal=$id");
      $personal->execute();
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