<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegEmpaque"||
     $ruta["query"]=="ctrInfoProvInternos"||
     $ruta["query"]=="ctrEditProvInterno"||
     $ruta["query"]=="ctrEliProvInterno"){
    $metodo=$ruta["query"];
    $ProvInterno=new ControladorProvInterno();
    $ProvInterno->$metodo();
  }
}


class ControladorProvInterno{

  static public function ctrInfoProvInternos(){
    $respuesta=ModeloProvInterno::mdlInfoProvInternos();
    return $respuesta;
  }

  static public function ctrRegEmpaque(){
    require "../modelo/provInternoModelo.php";

    $data=array(
      "producto"=>$_POST["producto"],
      "talla"=>$_POST["talla"],
      "color"=>$_POST["color"],
      "docenas"=>$_POST["docenas"],
      "unidades"=>$_POST["unidades"],
      "personal"=>$_POST["personal"]
    );

    $respuesta=ModeloProvInterno::mdlRegEmpaque($data);
    echo $respuesta;
  }

  static public function ctrInfoProvInterno($id){
    $respuesta=ModeloProvInterno::mdlInfoProvInterno($id);
    return $respuesta;
  }

  static public function ctrEditProvInterno(){
    require "../modelo/provInternoModelo.php";
   
    $data=array(
      "idEntrega"=>$_POST["idEntrega"],
      "producto"=>$_POST["producto"],
      "talla"=>$_POST["talla"],
      "color"=>$_POST["color"],
      "docenas"=>$_POST["docenas"],
      "unidades"=>$_POST["unidades"],
    );

    $respuesta=ModeloProvInterno::mdlEditProvInterno($data);
    echo $respuesta;
  }

  static public function ctrEliProvInterno(){
    require "../modelo/provInternoModelo.php";
    $data=$_POST["id"];
    $respuesta=ModeloProvInterno::mdlEliProvInterno($data);
    echo $respuesta;
  }  
}