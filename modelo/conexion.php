<?php

class Conexion
{
  /* CONEXION POR PDO */
  static public function conectar()
  {
    /* =============================
         PARA TRABAJAR DE MANERA LOCAL 
         =================================*/
    $host = "localhost";
    $db = "web_academico";
    $userDB = "root";
    $passDB = "";

    /* =============================
         PARA CONECTAR CON EL HOSTING
         =================================*/
    /* $host = "localhost";
        $db = "u497252732_web_academico";
        $userDB = "u497252732_root";
        $passDB = "Academico123!"; */

    $link = new PDO("mysql:host=" . $host . ";" . "dbname=" . $db, $userDB, $passDB);
    $link->exec("set names utf8");
    return $link;
  }
}
