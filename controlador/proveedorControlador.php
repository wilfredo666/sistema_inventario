<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegProveedor"||
     $ruta["query"]=="ctrEditProveedor"||
     $ruta["query"]=="ctrEliProveedor"||
     $ruta["query"]=="ctrBusProveedor"){
    $metodo=$ruta["query"];
    $Proveedor=new ControladorProveedor();
    $Proveedor->$metodo();
  }
}


class ControladorProveedor{

  static public function ctrInfoProveedors(){
    $respuesta=ModeloProveedor::mdlInfoProveedors();

    return $respuesta;
  }

  static public function ctrRegProveedor(){
    require "../modelo/proveedorModelo.php";

    $data=array(
      "rzProveedor"=>$_POST["rzProveedor"],
      "nitProveedor"=>$_POST["nitProveedor"],
      "dirProveedor"=>$_POST["dirProveedor"],
      "telProveedor"=>$_POST["telProveedor"],
      "emailProveedor"=>$_POST["emailProveedor"],
      "urlProveedor"=>$_POST["urlProveedor"]
    );
    /* var_dump($data); */
    $respuesta=ModeloProveedor::mdlRegProveedor($data);

    echo $respuesta;
  }

  static public function ctrInfoProveedor($id){
    $respuesta=ModeloProveedor::mdlInfoProveedor($id);

    return $respuesta;
  }

  static public function ctrEditProveedor(){
    require "../modelo/proveedorModelo.php";

    $data=array(
      "rzProveedor"=>$_POST["rzProveedor"],
      "idProveedor"=>$_POST["idProveedor"],
      "nitProveedor"=>$_POST["nitProveedor"],
      "dirProveedor"=>$_POST["dirProveedor"],
      "telProveedor"=>$_POST["telProveedor"],
      "emailProveedor"=>$_POST["emailProveedor"],
      "urlProveedor"=>$_POST["urlProveedor"],
      "estadoProveedor"=>$_POST["estadoProveedor"],
    );

    $respuesta=ModeloProveedor::mdlEditProveedor($data);
    echo $respuesta;
    /* var_dump($data) ; */

  }

  static public function ctrEliProveedor(){
    require "../modelo/ProveedorModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloProveedor::mdlEliProveedor($data);

    echo $respuesta;

  }

  static public function ctrBusProveedor(){
    require "../modelo/ProveedorModelo.php";
    $nitProveedor=$_POST["nitProveedor"];

    $respuesta=ModeloProveedor::mdlBusProveedor($nitProveedor);
    echo json_encode($respuesta);
  }

  static public function ctrCantidadProveedors(){
    $respuesta=ModeloProveedor::mdlCantidadProveedors();
    return $respuesta;
  }
}