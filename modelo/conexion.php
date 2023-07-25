<?php

class Conexion
{
    static public function conectar()
    {
        /* ==============================
        PARA TRABAJAR DE MANERA LOCAL
        ============================== */

        $host = "localhost";
        $db = "sistema_inventario";
        $userDB = "root";
        $passDB = "";

        /* ==============================
        PARA CONCETAR BD CON EL HOSTING
        ============================== */
        /* $host = "localhost";
        $db = "u263048258_sis_inventario";
        $userDB = "u263048258_sis_inventario";
        $passDB = "Administrador123"; */

        $link = new PDO("mysql:host=" . $host . ";" . "dbname=" . $db, $userDB, $passDB);
        $link->exec("set names utf8");
        return $link;
    }
}
