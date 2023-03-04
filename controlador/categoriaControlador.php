<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegCategoria"||
     $ruta["query"]=="ctrEditCategoria"||
     $ruta["query"]=="ctrEliCategoria"||
     $ruta["query"]=="ctrBusCategoria"){
    $metodo=$ruta["query"];
    $categoria=new ControladorCategoria();
    $categoria->$metodo();
  }
}


class ControladorCategoria{

  static public function ctrInfoCategorias(){
    $respuesta=ModeloCategoria::mdlInfoCategorias();

    return $respuesta;
  }

  static public function ctrRegCategoria(){
    require "../modelo/CategoriaModelo.php";

    $data=array(
      "desCategoria"=>$_POST["desCategoria"],
    );

    $respuesta=ModeloCategoria::mdlRegCategoria($data);
    echo $respuesta;
  }

  static public function ctrInfoCategoria($id){
    $respuesta=ModeloCategoria::mdlInfoCategoria($id);

    return $respuesta;
  }

  static public function ctrEditCategoria(){
    require "../modelo/categoriaModelo.php";

    $data=array(
      "desCategoria"=>$_POST["desCategoria"],
      "idCategoria"=>$_POST["idCategoria"],
    );

    $respuesta=ModeloCategoria::mdlEditCategoria($data);
    echo $respuesta;
    /* var_dump($data) ; */

  }

  static public function ctrEliCategoria(){
    require "../modelo/CategoriaModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloCategoria::mdlEliCategoria($data);

    echo $respuesta;

  }

  static public function ctrBusCategoria(){
    require "../modelo/CategoriaModelo.php";
    $nitCategoria=$_POST["nitCategoria"];

    $respuesta=ModeloCategoria::mdlBusCategoria($nitCategoria);
    echo json_encode($respuesta);
  }

  static public function ctrCantidadCategorias(){
    $respuesta=ModeloCategoria::mdlCantidadCategorias();
    return $respuesta;
  }
}