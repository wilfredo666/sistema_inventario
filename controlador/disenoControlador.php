<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegDiseno"||
     $ruta["query"]=="ctrEditDiseno"||
     $ruta["query"]=="ctrEliDiseno"||
     $ruta["query"]=="ctrBusDiseno"){
    $metodo=$ruta["query"];
    $Diseno=new ControladorDiseno();
    $Diseno->$metodo();
  }
}


class ControladorDiseno{

  static public function ctrInfoDisenos(){
    $respuesta=ModeloDiseno::mdlInfoDisenos();

    return $respuesta;
  }

  static public function ctrRegDiseno(){
    require "../modelo/DisenoModelo.php";

    $data=array(
      "descDiseno"=>$_POST["descDiseno"],
    );

    $respuesta=ModeloDiseno::mdlRegDiseno($data);
    echo $respuesta;
  }

  static public function ctrInfoDiseno($id){
    $respuesta=ModeloDiseno::mdlInfoDiseno($id);

    return $respuesta;
  }

  static public function ctrEditDiseno(){
    require "../modelo/disenoModelo.php";

    $data=array(
      "descDiseno"=>$_POST["descDiseno"],
      "idDiseno"=>$_POST["idDiseno"],
    );

    $respuesta=ModeloDiseno::mdlEditDiseno($data);
    echo $respuesta;
    /* var_dump($data) ; */
  }

  static public function ctrEliDiseno(){
    require "../modelo/DisenoModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloDiseno::mdlEliDiseno($data);

    echo $respuesta;

  }

  static public function ctrBusDiseno(){
    require "../modelo/DisenoModelo.php";
    $nitDiseno=$_POST["nitDiseno"];

    $respuesta=ModeloDiseno::mdlBusDiseno($nitDiseno);
    echo json_encode($respuesta);
  }

  static public function ctrCantidadDisenos(){
    $respuesta=ModeloDiseno::mdlCantidadDisenos();
    return $respuesta;
  }
}