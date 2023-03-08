<?php
/* controladores */
require_once "controlador/usuarioControlador.php";
require_once "controlador/clienteControlador.php";
require_once "controlador/productoControlador.php";
require_once "controlador/plantillaControlador.php";
require_once "controlador/categoriaControlador.php";
require_once "controlador/tallaControlador.php";
require_once "controlador/colorControlador.php";
require_once "controlador/medidaControlador.php";
/* modelos */
require_once "modelo/usuarioModelo.php";
require_once "modelo/clienteModelo.php";
require_once "modelo/productoModelo.php";
require_once "modelo/categoriaModelo.php";
require_once "modelo/tallaModelo.php";
require_once "modelo/colorModelo.php";
require_once "modelo/medidaModelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();