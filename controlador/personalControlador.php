<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegPersonal" ||
    $ruta["query"] == "ctrEditPersonal" ||
    $ruta["query"] == "ctrEliPersonal" ||
    $ruta["query"] == "ctrBusPersonal"
  ) {
    $metodo = $ruta["query"];
    $Personal = new ControladorPersonal();
    $Personal->$metodo();
  }
}


class ControladorPersonal
{

  static public function ctrInformacionPersonal()
  {
    $respuesta = ModeloPersonal::mdlInformacionPersonal();
    return $respuesta;
  }

  static public function ctrRegPersonal()
  {
    require "../modelo/personalModelo.php";

    $data = array(
      "nomPersonal" => $_POST["nomPersonal"],
      "patPersonal" => $_POST["patPersonal"],
      "matPersonal" => $_POST["matPersonal"],
      "ciPersonal" => $_POST["ciPersonal"],
      "nacPersonal" => $_POST["nacPersonal"],
      "cargoPersonal" => $_POST["cargoPersonal"],
      "telPersonal" => $_POST["telPersonal"],
      "dirPersonal" => $_POST["dirPersonal"],
    );

    $respuesta = ModeloPersonal::mdlRegPersonal($data);
    echo $respuesta;
  }

  static public function ctrInfoPersonal($id)
  {
    $respuesta = ModeloPersonal::mdlInfoPersonal($id);
    return $respuesta;
  }

  static public function ctrEditPersonal()
  {
    require "../modelo/personalModelo.php";

    $data = array(
      "idPersonal" => $_POST["idPersonal"],
      "nomPersonal" => $_POST["nomPersonal"],
      "patPersonal" => $_POST["patPersonal"],
      "matPersonal" => $_POST["matPersonal"],
      "ciPersonal" => $_POST["ciPersonal"],
      "nacPersonal" => $_POST["nacPersonal"],
      "cargoPersonal" => $_POST["cargoPersonal"],
      "telPersonal" => $_POST["telPersonal"],
      "dirPersonal" => $_POST["dirPersonal"],
      "estadoPersonal" => $_POST["estadoPersonal"],
    );
    $respuesta = ModeloPersonal::mdlEditPersonal($data);
    echo $respuesta;
  }

  static public function ctrEliPersonal()
  {
    require "../modelo/personalModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloPersonal::mdlEliPersonal($id);
    echo $respuesta;
  }
}
