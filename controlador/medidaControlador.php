<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegMedida"||
     $ruta["query"]=="ctrEditMedida"||
     $ruta["query"]=="ctrEliMedida"||
     $ruta["query"]=="ctrBusMedida"){
    $metodo=$ruta["query"];
    $medida=new ControladorMedida();
    $medida->$metodo();
  }
}


class ControladorMedida{

  static public function ctrInfoMedidas(){
    $respuesta=ModeloMedida::mdlInfoMedidas();

    return $respuesta;
  }

  static public function ctrRegMedida(){
    require "../modelo/medidaModelo.php";

    $data=array(
      "descMedida"=>$_POST["descMedida"],
    );

    $respuesta=ModeloMedida::mdlRegMedida($data);
    echo $respuesta;
  }

  static public function ctrInfoMedida($id){
    $respuesta=ModeloMedida::mdlInfoMedida($id);

    return $respuesta;
  }

  static public function ctrEditMedida(){
    require "../modelo/medidaModelo.php";

    $data=array(
      "descMedida"=>$_POST["descMedida"],
      "idMedida"=>$_POST["idMedida"],
    );

    $respuesta=ModeloMedida::mdlEditMedida($data);
    echo $respuesta;
    /* var_dump($data) ; */

  }

  static public function ctrEliMedida(){
    require "../modelo/medidaModelo.php";
    $data=$_POST["id"];

    ModeloMedida::mdlEliMedida($data);

    //echo $respuesta;

  }

  static public function ctrBusMedida(){
    require "../modelo/medidaModelo.php";
    $nitMedida=$_POST["nitMedida"];

    $respuesta=ModeloMedida::mdlBusMedida($nitMedida);
    echo json_encode($respuesta);
  }

  static public function ctrCantidadMedidas(){
    $respuesta=ModeloMedida::mdlCantidadMedidas();
    return $respuesta;
  }
}