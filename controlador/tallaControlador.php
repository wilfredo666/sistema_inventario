<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegTalla"||
     $ruta["query"]=="ctrEditTalla"||
     $ruta["query"]=="ctrEliTalla"||
     $ruta["query"]=="ctrBusTalla"){
    $metodo=$ruta["query"];
    $talla=new ControladorTalla();
    $talla->$metodo();
  }
}


class ControladorTalla{

  static public function ctrInfoTallas(){
    $respuesta=ModeloTalla::mdlInfoTallas();

    return $respuesta;
  }

  static public function ctrRegTalla(){
    require "../modelo/TallaModelo.php";

    $data=array(
      "desTalla"=>$_POST["desTalla"],
    );

    $respuesta=ModeloTalla::mdlRegTalla($data);
    echo $respuesta;
  }

  static public function ctrInfoTalla($id){
    $respuesta=ModeloTalla::mdlInfoTalla($id);

    return $respuesta;
  }

  static public function ctrEditTalla(){
    require "../modelo/TallaModelo.php";

    $data=array(
      "desTalla"=>$_POST["desTalla"],
      "idTalla"=>$_POST["idTalla"],
    );

    $respuesta=ModeloTalla::mdlEditTalla($data);
    echo $respuesta;
    /* var_dump($data) ; */

  }

  static public function ctrEliTalla(){
    require "../modelo/TallaModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloTalla::mdlEliTalla($data);

    echo $respuesta;

  }

  static public function ctrBusTalla(){
    require "../modelo/TallaModelo.php";
    $nitTalla=$_POST["nitTalla"];

    $respuesta=ModeloTalla::mdlBusTalla($nitTalla);
    echo json_encode($respuesta);
  }

  static public function ctrCantidadTallas(){
    $respuesta=ModeloTalla::mdlCantidadTallas();
    return $respuesta;
  }
}