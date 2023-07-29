<?php
session_start();
/* session_destroy(); */
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Inventario</title>
    <link rel="shortcut icon" href="#">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assest/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assest/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assest/dist/css/adminlte.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assest/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assest/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assest/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assest/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <!-- <link rel="stylesheet" href="assest/plugins/daterangepicker/daterangepicker.css"> -->

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="assest/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assest/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="assest/plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assest/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="assest/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assest/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="assest/plugins/summernote/summernote-bs4.min.css">

    <!-- dropzonejs -->
    <link rel="stylesheet" href="assest/plugins/dropzone/min/dropzone.min.css">
    <!--icono-->
    <link rel="icon" href="assest/dist/img/logoHermen.png">

    <script type="text/javascript" src="assest/dist/js/otros/jquery.min.js"></script>
    <script type="text/javascript" src="assest/dist/js/otros/moment.min.js"></script>
    <!--   <script type="text/javascript" src="assest/dist/js/otros/daterangepicker.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="assest/dist/js/otros/daterangepicker.css" />

    <style>
      table {
        /*font-size: 14px;*/
      }

      .brand-link {
        padding: 3%;
      }

      .main-header {
        padding: 0.2%;
      }

      aside {
        /* font-size: 0.9em;*/
      }

      table.dataTable tbody th,
      table.dataTable tbody td {
        /*padding: 0;*/
      }
      .table-title{
        border-left: 5px solid #6c757d;
        padding-left:5px;
        color:#484848;
      }
    </style>
  </head>

  <?php
  if (isset($_SESSION["ingreso"]) && $_SESSION["ingreso"] == "ok") {
    include "asideMenu.php";

    //usuario
    if ($_GET["ruta"] == "permisos") {
      $ruta = "usuario/permisos.php";
    }

    if (isset($_GET["ruta"])) {
      if (
        $_GET["ruta"] == "inicio"
        || $_GET["ruta"] == "salir"
        || $_GET["ruta"] == "VUsuario"
        || $_GET["ruta"] == "VCliente"
        || $_GET["ruta"] == "VCategoria"
        || $_GET["ruta"] == "VTalla"
        || $_GET["ruta"] == "VColor"
        || $_GET["ruta"] == "VMedida"
        || $_GET["ruta"] == "VProducto"
        || $_GET["ruta"] == "FNotaVenta"
        || $_GET["ruta"] == "FNotaSalida"
        || $_GET["ruta"] == "FNotaIngreso"
        || $_GET["ruta"] == "FOtrosIngresos"
        || $_GET["ruta"] == "VFactura"
        || $_GET["ruta"] == "RNotaSalida"
        || $_GET["ruta"] == "RNotaIngreso"
        || $_GET["ruta"] == "VProveedor"
        || $_GET["ruta"] == "VReporte"
        || $_GET["ruta"] == "VRepMovimiento"
        || $_GET["ruta"] == "VRepClasificacion"
        || $_GET["ruta"] == "VGrupo"
        || $_GET["ruta"] == "VDiseno"
        || $_GET["ruta"] == "VPersonal"
        || $_GET["ruta"] == "VProvInterno"
      ) {
        $ruta = $_GET["ruta"] . ".php";
      }
      include $ruta;
      include "vista/footer.php";
    }
  } else {
    include "vista/login.php";
  }

  ?>