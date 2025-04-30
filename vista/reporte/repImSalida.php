<?php
require "../../assest/fpdf/fpdf.php";
require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";

//capturando valores por get de RNotaSalidaOtros.php
$id=$_GET["id"];

//trayendo informacion de ventaControlador.php
$notaSalida = ControladorVenta::ctrInfoNotaSalidaOtros($id);
$productos = json_decode($notaSalida["detalle_salida_otros"], true);


$today = getdate();

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 1);

$pdf->SetFont('Arial', '', 11);
$pdf->setX(12);
$pdf->setY(0);
$pdf->Image('../../assest/dist/img/bianchi.jpg', 160, 10, 46);
$pdf->Cell(50, 9, '', 0, 1, 'C');
$pdf->Cell(50, 9, 'HERMEN LTDA INDUSTRIA', 0, 1, 'C');
$pdf->Cell(50, 0, 'TEXTIL', 0, 1, 'C');
$pdf->Cell(55, 8, 'Tel: 2833403    Fax:2836087', 0, 0, 'C');
$pdf->SetFont('Arial', 'B', 24);
$pdf->Cell(95, 3, 'NOTA DE SALIDA', 0, 1, 'C');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(55, 10, 'La Paz - Bolivia', 0, 1, 'C');
$pdf->Cell(70, 5, '', 0, 1);

//$pdf->Cell(140, 8, 'Nombre: ' . " " . $notaSalida['observacion'], 0, 0);
$pdf->Cell(70, 8, 'Nota:' . " " . $notaSalida['codigo_salida_otros'], 0, 1);
$pdf->Multicell(140, 5, utf8_decode('Observación:') . " " . utf8_decode($notaSalida['observacion_salida_otros']), 0, 0);
$pdf->SetFont('Arial', '', 11);
$pdf->setY(45);
$pdf->setX(150);
$pdf->Cell(70, 5, 'Fecha: ' . " " . $notaSalida['fecha_salida_otros'], 0, 1);
$pdf->Cell(70, 5, '', 0, 1);
$pdf->Cell(70, 5, '', 0, 1);


$pdf->SetFont('Arial', 'B', 11);
$pdf->setX(15);
$pdf->Cell(28, 5, 'Cod Prod.', 1, 0, "C");
$pdf->Cell(75, 5, utf8_decode('Artículo'), 1, 0, "C");
$pdf->Cell(18, 5, utf8_decode('Docenas'), 1, 0, "C");
$pdf->Cell(18, 5, utf8_decode('Unidades'), 1, 0, "C");
$pdf->Cell(23, 5, utf8_decode('P/Docena'), 1, 0, "C");
$pdf->Cell(23, 5, utf8_decode('Total'), 1, 1, "C");


$totalUnidades = 0;
$totalDocenas = 0;
$totalCosto = 0;

foreach ($productos as $producto) {
    require_once "../../controlador/productoControlador.php";
    require_once "../../modelo/productoModelo.php";
    $prod = ControladorProducto::ctrInfoProducto($producto['idProducto']);

    $precioUnidad = $producto['costoProducto'] / 12; //costo por unidad
    $totalUnidad = ($producto['cantProdDocena'] * 12) + $producto['cantProdUnidad']; //total de unidades
    $total = $totalUnidad * $precioUnidad;
  
    //$totalUnidades = $totalUnidades + $totalUnidad;
    $totalUnidades = $totalUnidades + $producto['cantProdUnidad'];
    $totalDocenas = $totalDocenas + $producto['cantProdDocena'];
    $totalCosto = $totalCosto + $total;

    $descripcionTruncada = (strlen($producto['descProducto']) > 40)
        ? mb_substr($producto['descProducto'], 0, 40) . '...'
        : $producto['descProducto'];


    $pdf->setX(15);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(28, 8, $prod['cod_producto'], 1, 0, "C");
    $pdf->Cell(75, 8, utf8_decode($descripcionTruncada), 1, 0, "");
    $pdf->Cell(18, 8, $producto['cantProdDocena'], 1, 0, "C");
    $pdf->Cell(18, 8, $producto['cantProdUnidad'], 1, 0, "C");
    $pdf->Cell(23, 8, $producto['costoProducto'], 1, 0, "C");
    $pdf->Cell(23, 8, number_format(round($total, 2), 2), 1, 1, "C");
}


$pdf->setX(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(103, 8, "T O T A L E S ", 1, 0, "C");
$pdf->Cell(18, 8, $totalDocenas, 1, 0, "C");
$pdf->Cell(18, 8, $totalUnidades, 1, 0, "C");
$pdf->Cell(23, 8, "", 1, 0, "C");
$pdf->Cell(23, 8, $totalCosto, 1, 0, "C");

$pdf->Cell(20, 35, "", 0, 1, "C");

$pdf->setX(25);
$pdf->Cell(50, 8, utf8_decode("Almacén"), "T", 0, "C");
$pdf->setX(85);
$pdf->Cell(50, 8, utf8_decode('Administración'), "T", 0, "C");



$pdf->Output();

?>