<?php
require_once "conexion.php";
class ModeloUsuario
{
  /* metodo de acceso al sistema */
  static public function mdlAccesoUsuario($usuario)
  {
    $stmt = Conexion::conectar()->prepare("select * from usuario where login_usuario='$usuario'");
    $stmt->execute();
    return $stmt->fetch();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoUsuarios()
  {
    $stmt = Conexion::conectar()->prepare("select * from usuario");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegUsuario($data)
  {
    $loginUsuario = $data["loginUsuario"];
    $nomUsuario = $data["nomUsuario"];
    $passUsuario = $data["passUsuario"];
    $perfilUsuario = $data["perfilUsuario"];

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");

    $stmt = Conexion::conectar()->prepare("insert into usuario(login_usuario, nombre_usuario, password, perfil, estado , fecha_registro) values('$loginUsuario','$nomUsuario','$passUsuario','$perfilUsuario',0, '$fecha')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoUsuario($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from usuario where id_usuario=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlActualizarAcceso($fechaHora, $id)
  {

    $stmt = Conexion::conectar()->prepare("update usuario set ultimo_login='$fechaHora' where id_usuario=$id");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditUsuario($data)
  {
    $idUsuario = $data["idUsuario"];
    $nomUsuario = $data["nomUsuario"];
    $passUsuario = $data["passUsuario"];
    $perfilUsuario = $data["perfilUsuario"];
    $estadoUsuario = $data["estadoUsuario"];


    $stmt = Conexion::conectar()->prepare("update usuario set password='$passUsuario', nombre_usuario='$nomUsuario', perfil='$perfilUsuario', estado='$estadoUsuario' where id_usuario=$idUsuario");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
  static public function mdlUsuarioPermiso($idUsuario,$idPermiso){
    $stmt = Conexion::conectar()->prepare("select * from permiso_usuario where id_usuario=$idUsuario and id_permiso=$idPermiso");

    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlActualizarPermiso($data){
    $idUsuario=$data["idUsuario"];
    $idPermiso=$data["idPermiso"];

    $permiso = Conexion::conectar()->prepare("select * from permiso_usuario where id_usuario=$idUsuario and id_permiso=$idPermiso");
    $permiso->execute();

    if(($permiso->fetch())!=null){
      $stmt = Conexion::conectar()->prepare("delete from permiso_usuario  where id_usuario=$idUsuario and id_permiso=$idPermiso");
    }else{
      $stmt = Conexion::conectar()->prepare("insert into permiso_usuario (id_usuario, id_permiso) values ($idUsuario, $idPermiso)");
    }

    if ( $stmt->execute() ) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

}
