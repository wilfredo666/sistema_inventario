<?php

class Conexion
{
  /* CONEXION POR PDO */
  static public function conectar()
  {
    /* =============================
         PARA TRABAJAR DE MANERA LOCAL 
         =================================*/

    /*$host = "localhost";
    $db = "sistema_inventario";
    $userDB = "root";
    $passDB = "";

    $link = new PDO("mysql:host=" . $host . ";" . "dbname=" . $db, $userDB, $passDB);*/

    /* =============================
      PARA TRABAJAR CON EL SERVIDOR REMOTO
      =================================*/

    $host = "localhost";
    $db = "u184609663_inventario";
    $userDB = "u184609663_root";
    $passDB = "Admin123!";
    $link = new PDO("mysql:host=" . $host . ";" . "dbname=" . $db, $userDB, $passDB);

    //retornando
    $link->exec("set names utf8");
    return $link;
  }
}

