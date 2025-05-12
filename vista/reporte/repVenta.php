<?php
require "../../assest/fpdf/fpdf.php";
require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";

$id = $_GET["id"];
$notaSalida = ControladorVenta::ctrInfoNotaSalida($id);
$productos = json_decode($notaSalida["detalle_venta"], true);

$today = getdate();

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 1);
/* $pdf->SetFont('Arial','B',16); */

$pdf->SetFont('Arial', '', 11);
$pdf->setX(12);
$pdf->setY(0);
$pdf->Image('../../assest/dist/img/bianchi.jpg', 160, 10, 46);
$pdf->Cell(50, 9, '', 0, 1, 'C');
$pdf->Cell(50, 9, 'HERMEN LTDA INDUSTRIA', 0, 1, 'C');
$pdf->Cell(50, 0, 'TEXTIL', 0, 1, 'C');
$pdf->Cell(55, 8, 'Tel: 2833403    Fax:2836087', 0, 0, 'C');
$pdf->SetFont('Arial', 'B', 24);
$pdf->Cell(95, 3, 'NOTA DE VENTA', 0, 1, 'C');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(55, 10, 'La Paz - Bolivia', 0, 1, 'C');
$pdf->Cell(70, 5, '', 0, 1);

$pdf->Cell(140, 8, 'Nombre: ' . " " . $notaSalida['razon_social_cliente'], 0, 0);
$pdf->Cell(70, 8, 'Nota:' . " " . $notaSalida['codigo_venta'], 0, 1);
$pdf->Multicell(140, 5, utf8_decode('Dirección:') . " " . utf8_decode($notaSalida['direccion_cliente']), 0, 0);
$pdf->SetFont('Arial', '', 11);
$pdf->setY(45);
$pdf->setX(150);
$pdf->Cell(70, 5, 'Fecha: ' . " " . $notaSalida['fecha_emision'], 0, 1);
$pdf->Cell(70, 5, '', 0, 1);
$pdf->Cell(70, 5, '', 0, 1);

$pdf->setX(8);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(25, 5, 'ID Prod.', 1, 0, "C");
$pdf->Cell(75, 5, utf8_decode('Artículo'), 1, 0, "C");
$pdf->Cell(12, 5, utf8_decode('Doc.'), 1, 0, "C");
$pdf->Cell(12, 5, utf8_decode('Uni.'), 1, 0, "C");
$pdf->Cell(20, 5, utf8_decode('Precio'), 1, 0, "C");
$pdf->Cell(20, 5, utf8_decode('SubTotal'), 1, 0, "C");
$pdf->Cell(18, 5, utf8_decode('Desc'), 1, 0, "C");
$pdf->Cell(20, 5, utf8_decode('Total'), 1, 1, "C");

$totalUnidades = 0;
foreach ($productos as $producto) {
    require_once "../../controlador/productoControlador.php";
    require_once "../../modelo/productoModelo.php";
    $prod = ControladorProducto::ctrInfoProducto($producto['idProducto']);

    $precioUnidad = $producto['costoProducto'] / 12;
    $totalUnidad = ($producto['cantProdDocena'] * 12) + $producto['cantProdUnidad'];
    $subTotal = $totalUnidad * $precioUnidad;
    $descuentoProd = $subTotal * ($producto['descuentoCliente'] / 100);
    $liquidoNeto = $subTotal - (($subTotal * $producto['descuentoCliente']) / 100);

    $totalUnidades = $totalUnidades + $totalUnidad;

    $descripcionTruncada = (strlen($producto['descProducto']) > 40)
        ? mb_substr($producto['descProducto'], 0, 40) . '...'
        : $producto['descProducto'];


    $pdf->setX(8);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(25, 8, $prod['cod_producto'], 1, 0, "C");
    $pdf->Cell(75, 8, utf8_decode($descripcionTruncada), 1, 0, "");
    $pdf->Cell(12, 8, $producto['cantProdDocena'], 1, 0, "C");
    $pdf->Cell(12, 8, $producto['cantProdUnidad'], 1, 0, "C");
    $pdf->Cell(20, 8, $producto['costoProducto'], 1, 0, "C");
    $pdf->Cell(20, 8, number_format(round($subTotal, 2), 2), 1, 0, "C");
    $pdf->Cell(18, 8, number_format(round($descuentoProd, 2), 2), 1, 0, "C");
    $pdf->Cell(20, 8, number_format(round($liquidoNeto, 2), 2), 1, 1, "C");
}
$totalDoc = floor(($totalUnidades / 12));
$totalUni = $totalUnidades - ($totalDoc * 12);
$pdf->setX(8);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(100, 8, "T O T A L E S ", 1, 0, "C");
$pdf->Cell(12, 8, $totalDoc, 1, 0, "C");
$pdf->Cell(12, 8, $totalUni, 1, 0, "C");
$pdf->Cell(20, 8, "", 1, 0, "C");
$pdf->Cell(20, 8, number_format(round($notaSalida["total"],2),2), 1, 0, "C");
$pdf->Cell(18, 8, number_format(round($notaSalida["decventa"],2),2), 1, 0, "C");
$pdf->Cell(20, 8, number_format(round($notaSalida["neto"],2),2), 1, 0, "C");
$pdf->Cell(20, 35, "", 0, 1, "C");

$pdf->setX(25);
$pdf->Cell(50, 8, "Cliente", "T", 0, "C");
$pdf->setX(85);
$pdf->Cell(50, 8, utf8_decode('Almacén'), "T", 0, "C");
$pdf->setX(145);
$pdf->Cell(50, 8, utf8_decode('Administración'), "T", 1, "C");
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(20, 15, utf8_decode('Observación: ' . $notaSalida["observacion"]), 0, 1, "");


/* $pdf->Image('../../assest/dist/img/Logo_sin _corchetes.png'); */

$pdf->Output();
