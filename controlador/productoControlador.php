<?php 
$ruta=parse_url($_SERVER['REQUEST_URI']);

if(isset($ruta["query"])){
  if($ruta["query"]=="ctrRegProducto"||
     $ruta["query"]=="ctrInfoProductos"||
     $ruta["query"]=="ctrEditProducto"||
     $ruta["query"]=="ctrEliProducto"||
     $ruta["query"]=="ctrRepClasificacion"||
     $ruta["query"]=="ctrBusProducto"){
    $metodo=$ruta["query"];
    $producto=new ControladorProducto();
    $producto->$metodo();
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
      "nomProducto"=>$_POST["nomProducto"],
      "costoProducto"=>$_POST["costoProducto"],
      "precioProducto"=>$_POST["precioProducto"],
      "grupoProducto"=>$_POST["grupoProducto"],
      "disenoProducto"=>$_POST["disenoProducto"],
      "tallaProducto"=>$_POST["tallaProducto"],
      "categoriaProducto"=>$_POST["categoriaProducto"],
      "medidaProducto"=>$_POST["medidaProducto"],
      "colorProducto"=>$_POST["colorProducto"],
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
      "idProducto"=>$_POST["idProducto"],
      "codProducto"=>$_POST["codProducto"],
      "nomProducto"=>$_POST["nomProducto"],
      "costoProducto"=>$_POST["costoProducto"],
      "precioProducto"=>$_POST["precioProducto"],
      "tallaProducto"=>$_POST["tallaProducto"],
      "categoriaProducto"=>$_POST["categoriaProducto"],
      "grupoProducto"=>$_POST["grupoProducto"],
      "disenoProducto"=>$_POST["disenoProducto"],
      "medidaProducto"=>$_POST["medidaProducto"],
      "colorProducto"=>$_POST["colorProducto"],
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
    
  static public function ctrRepClasificacion(){
    $categoriaProducto = $_POST["categoriaProducto"];
    $color = $_POST["color"];
    $diseno = $_POST["diseno"];
    $grupo = $_POST["grupo"];
    $talla = $_POST["talla"];

    var_dump($diseno);
    var_dump($grupo);
    var_dump($talla);
    var_dump($color);
    var_dump($categoriaProducto);
  }

  /*  */
  
}