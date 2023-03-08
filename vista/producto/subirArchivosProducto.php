<?php
$rzCliente=$_GET["nombre"];
$ruta = "../../assest/dist/file/cliente/".$rzCliente."/";

//comprobar la existencia del directorio
if(file_exists($ruta)==false){
  //creamos un directorio
  $directorio="../../assest/dist/file/cliente/".$rzCliente;
  mkdir($directorio, 0755);
}

$nombre=$_FILES["file"]["name"];
$archivo=$_FILES["file"]["tmp_name"];
move_uploaded_file($archivo, $ruta.$nombre);

//var_dump($_FILES["file"]);
?>