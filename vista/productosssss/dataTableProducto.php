<?php
require_once "../../controlador/productoControlador.php";
require_once "../../modelo/productoModelo.php";

$producto=ControladorProducto::ctrInfoProductos();

$datosJson= '{
    "data":[';
foreach($producto as $key => $value){

  if($value["imagen_producto"]==""){
    
    $imagen="<img src='assest/dist/img/productos/product_default.png'  width='50'>";
    
  }else{
    
     $imagen="<img src='assest/dist/img/productos/".$value['imagen_producto']."' width='50'>";
    
  }
  
  if($value["estado"]==1){
    
    $disponible="<span class='badge badge-success'>Disponible</span>";
    
  }else{
    
     $disponible="<span class='badge badge-danger'>No disponible</span>";
    
  }
  
  $botones="<div class='btn-group'><button class='btn btn-info' onclick='MVerProducto(".$value['id_producto'].")'><i class='fas fa-eye'></i></button><button class='btn btn-secondary' onclick='MEditProducto(".$value['id_producto'].")'><i class='fa fa-edit'></i></button><button class='btn btn-danger' onclick='MEliProducto(".$value['id_producto'].")'><i class='fa fa-trash'></i></button></div>";
  $datosJson.='[
        "'.$value["cod_producto"].'",
        "'.$value["nombre_producto"].'",
        "'.$imagen.'",
        "'.$disponible.'",
        "'.$botones.'"
      ],';

}
$datosJson=substr($datosJson, 0, -1);
$datosJson.=']
  }';

echo $datosJson;
