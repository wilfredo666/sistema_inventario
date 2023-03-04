<?php
require_once "../../controlador/productoControlador.php";
require_once "../../modelo/productoModelo.php";

$producto=ControladorProducto::ctrInfoProductosVenta();

$datosJson= '{
    "data":[';
foreach($producto as $key => $value){
  
  $botones="<div class='btn-group'><button type='button' class='btn btn-info btn-block btn-sm' onclick='agregarCarrito2(".$value['id_producto'].")'><i class='fas fa-plus'></i></button></div>";
  $datosJson.='[
        "'.$value["cod_producto"].'",
        "'.$value["nombre_producto"].'",
        "'.$botones.'"
      ],';

}
$datosJson=substr($datosJson, 0, -1);
$datosJson.=']
  }';

echo $datosJson;
