<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegCliente"||
     $ruta["query"]=="ctrEditCliente"||
     $ruta["query"]=="ctrEliCliente"||
     $ruta["query"]=="ctrBusCliente"){
    $metodo=$ruta["query"];
    $cliente=new ControladorCliente();
    $cliente->$metodo();
  }
}


class ControladorCliente{

  static public function ctrInfoClientes(){
    $respuesta=ModeloCliente::mdlInfoClientes();

    return $respuesta;
  }

  static public function ctrRegCliente(){
    require "../modelo/clienteModelo.php";

    $data=array(
      "rzCliente"=>$_POST["rzCliente"],
      "nitCliente"=>$_POST["nitCliente"],
      "dirCliente"=>$_POST["dirCliente"],
      "nomCliente"=>$_POST["nomCliente"],
      "telCliente"=>$_POST["telCliente"],
    );

    $respuesta=ModeloCliente::mdlRegCliente($data);

    echo $respuesta;
  }

  static public function ctrInfoCliente($id){
    $respuesta=ModeloCliente::mdlInfoCliente($id);

    return $respuesta;
  }

  static public function ctrEditCliente(){
    require "../modelo/clienteModelo.php";

    $data=array(
      "rzCliente"=>$_POST["rzCliente"],
      "idCliente"=>$_POST["idCliente"],
      "nitCliente"=>$_POST["nitCliente"],
      "dirCliente"=>$_POST["dirCliente"],
      "nomCliente"=>$_POST["nomCliente"],
      "telCliente"=>$_POST["telCliente"],
    );

    $respuesta=ModeloCliente::mdlEditCliente($data);
    echo $respuesta;
    /* var_dump($data) ; */

  }

  static public function ctrEliCliente(){
    require "../modelo/ClienteModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloCliente::mdlEliCliente($data);

    echo $respuesta;

  }

  static public function ctrBusCliente(){
    require "../modelo/ClienteModelo.php";
    $nitCliente=$_POST["nitCliente"];

    $respuesta=ModeloCliente::mdlBusCliente($nitCliente);
    echo json_encode($respuesta);
  }

  static public function ctrCantidadClientes(){
    $respuesta=ModeloCliente::mdlCantidadClientes();
    return $respuesta;
  }
}