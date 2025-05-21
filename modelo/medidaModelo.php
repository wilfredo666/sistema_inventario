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

    try {
      $stmt = Conexion::conectar()->prepare("DELETE FROM unidad_medida WHERE id_medida = :id");
      $stmt->bindParam(":id", $data, PDO::PARAM_INT);
      $stmt->execute();

      echo json_encode(["status" => "ok", "message" => "Medida eliminada correctamente"]);
    } catch (PDOException $e) {
      if ($e->getCode() == 23000) {
        echo json_encode([
          "status" => "error",
          "message" => "No se puede eliminar porque hay dependencias en otra tabla"
        ]);
      } else {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
      }
    }

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