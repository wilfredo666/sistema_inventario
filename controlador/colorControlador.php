<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegColor"||
     $ruta["query"]=="ctrEditColor"||
     $ruta["query"]=="ctrEliColor"||
     $ruta["query"]=="ctrBusColor"){
    $metodo=$ruta["query"];
    $color=new ControladorColor();
    $color->$metodo();
  }
}


class ControladorColor{

  static public function ctrInfoColores(){
    $respuesta=ModeloColor::mdlInfoColores();

    return $respuesta;
  }

  static public function ctrRegColor(){
    require "../modelo/colorModelo.php";

    $data=array(
      "desColor"=>$_POST["desColor"],
      "codigoColor"=>$_POST["codigoColor"],
    );
    $respuesta=ModeloColor::mdlRegColor($data);
    echo $respuesta;
  }

  static public function ctrInfoColor($id){
    $respuesta=ModeloColor::mdlInfoColor($id);

    return $respuesta;
  }

  static public function ctrEditColor(){
    require "../modelo/colorModelo.php";

    $data=array(
      "desColor"=>$_POST["desColor"],
      "codigoColor"=>$_POST["codigoColor"],
      "idColor"=>$_POST["idColor"],
    );

    $respuesta=ModeloColor::mdlEditColor($data);
    echo $respuesta;
    /* var_dump($data) ; */

  }

  static public function ctrEliColor(){
    require "../modelo/ColorModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloColor::mdlEliColor($data);

    echo $respuesta;

  }

  static public function ctrBusColor(){
    require "../modelo/ColorModelo.php";
    $nitColor=$_POST["nitColor"];

    $respuesta=ModeloColor::mdlBusColor($nitColor);
    echo json_encode($respuesta);
  }

  static public function ctrCantidadColors(){
    $respuesta=ModeloColor::mdlCantidadColors();
    return $respuesta;
  }
}