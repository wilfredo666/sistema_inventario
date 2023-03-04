<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegProducto"||
     $ruta["query"]=="ctrEditProducto"||
     $ruta["query"]=="ctrEliProducto"||
     $ruta["query"]=="ctrBusProducto"){
    $metodo=$ruta["query"];
    $Producto=new ControladorProducto();
    $Producto->$metodo();
  }
}


class ControladorProducto{

  static public function ctrInfoProductos(){
    $respuesta=ModeloProducto::mdlInfoProductos();

    return $respuesta;
  }

  static public function ctrRegProducto(){
    require "../modelo/productoModelo.php";

    $imagen=$_FILES["ImgProducto"];

    $nomImagen=$imagen["name"];
    $archImagen=$imagen["tmp_name"];

    move_uploaded_file($archImagen,"../assest/dist/img/productos/".$nomImagen);

    $data=array(
      "codProducto"=>$_POST["codProducto"],
      "descProducto"=>$_POST["descProducto"],
      "imgProducto"=>$nomImagen,
    );

    $respuesta=ModeloProducto::mdlRegProducto($data);

    echo $respuesta;
  }

  static public function ctrInfoProducto($id){
    $respuesta=ModeloProducto::mdlInfoProducto($id);
    return $respuesta;
  }

  static public function ctrEditProducto(){
    require "../modelo/productoModelo.php";
    $imgProdActual=$_POST["imgActProducto"];
    
    $imgProducto=$_FILES["ImgProducto"];
    
    if($imgProducto["name"]==""){
      $imagen=$imgProdActual;
    }else{
      
      $imagen=$imgProducto["name"];
      $archImagen=$imgProducto["tmp_name"];
      
      move_uploaded_file($archImagen,"../assest/dist/img/productos/".$imagen);
    }

    $data=array(
      "descProducto"=>$_POST["descProducto"],
      /* "UMProducto"=>$_POST["UMProducto"], */
      "idProducto"=>$_POST["idProducto"],
      "ImgProducto"=>$imagen,
      "estadoProducto"=>$_POST["estadoProducto"]
    );

    $respuesta=ModeloProducto::mdlEditProducto($data);

    echo $respuesta;

  }

  static public function ctrEliProducto(){
    require "../modelo/productoModelo.php";
    $data=$_POST["id"];

    $respuesta=ModeloProducto::mdlEliProducto($data);

    echo $respuesta;

  }

  static public function ctrBusProducto(){
    require "../modelo/productoModelo.php";
    $idProducto=$_POST["idProducto"];

    $respuesta=ModeloProducto::mdlBusProducto($idProducto);

    echo json_encode($respuesta);
  }

  static public function ctrCantidadProductos(){
    $respuesta=ModeloProducto::mdlCantidadProductos();
    return $respuesta;
  }

  static public function ctrInfoProductosVenta(){
    $respuesta=ModeloProducto::mdlInfoProductosVenta();

    return $respuesta;
  }
    
  
}