<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegGrupo"||
     $ruta["query"]=="ctrEditGrupo"||
     $ruta["query"]=="ctrEliGrupo"||
     $ruta["query"]=="ctrBusGrupo"){
    $metodo=$ruta["query"];
    $Grupo=new ControladorGrupo();
    $Grupo->$metodo();
  }
}


class ControladorGrupo{

  static public function ctrInfoGrupos(){
    $respuesta=ModeloGrupo::mdlInfoGrupos();

    return $respuesta;
  }

  static public function ctrRegGrupo(){
    require "../modelo/grupoModelo.php";

    $data=array(
      "descGrupo"=>$_POST["descGrupo"],
    );

    $respuesta=ModeloGrupo::mdlRegGrupo($data);
    echo $respuesta;
  }

  static public function ctrInfoGrupo($id){
    $respuesta=ModeloGrupo::mdlInfoGrupo($id);

    return $respuesta;
  }

  static public function ctrEditGrupo(){
    require "../modelo/grupoModelo.php";

    $data=array(
      "descGrupo"=>$_POST["descGrupo"],
      "idGrupo"=>$_POST["idGrupo"],
    );

    $respuesta=ModeloGrupo::mdlEditGrupo($data);
    echo $respuesta;
    /* var_dump($data) ; */
  }

  static public function ctrEliGrupo(){
    require "../modelo/GrupoModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloGrupo::mdlEliGrupo($data);

    echo $respuesta;

  }

  static public function ctrBusGrupo(){
    require "../modelo/GrupoModelo.php";
    $nitGrupo=$_POST["nitGrupo"];

    $respuesta=ModeloGrupo::mdlBusGrupo($nitGrupo);
    echo json_encode($respuesta);
  }

  static public function ctrCantidadGrupos(){
    $respuesta=ModeloGrupo::mdlCantidadGrupos();
    return $respuesta;
  }
}