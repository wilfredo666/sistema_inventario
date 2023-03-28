<?php
require "../../assest/fpdf/fpdf.php";
require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";


$id = $_GET["id"];

$NotaVenta = ControladorVenta::ctrInfoNotaVenta($id);
/* echo ('<pre>');        
var_dump($NotaVenta);
echo ('<pre>'); */
$productos = json_decode($NotaVenta["detalle_factura"], true);

$pdf = new FPDF();
$pdf->AddPage();



$pdf->SetFont('times', '', 11);
$pdf->Cell(50, 8, "HERMEN LTDA INDUSTRIA ", 0, 1);
$pdf->Cell(50, 1, "TEXTIL", 0, 1, 'C');
$pdf->Cell(50, 8, "Telf: 3833403 Fax: 2836087", 0, 0, 'C');
$pdf->SetFont('times', 'B', 22);
$pdf->Cell(90, 4, "NOTA DE VENTA", 0, 0, 'C');
$pdf->SetFont('helvetica', 'B', 22);
$pdf->Cell(50, 4, utf8_decode("BIANCHI"), 0, 1, 'C');
$pdf->SetFont('times', '', 10);
$pdf->Cell(50, 8, "La Paz - Bolivia", 0, 1, 'C');

$pdf->Rect(9, 33, 190, 15);
$pdf->SetFont('times', '', 11);
$pdf->Cell(50, 2, "", 0, 1);
$pdf->Cell(50, 8, "Sr (es): " . utf8_decode($NotaVenta["razon_social_cliente"]), 0, 0);
$pdf->setX(130);
$pdf->Cell(50, 8, "Nota: " . $NotaVenta["codigo_factura"], 0, 0);
$pdf->setX(110);
$pdf->Cell(50, 8, "", 0, 1);
$pdf->Cell(130, 5, utf8_decode("Dirección: ") . utf8_decode($NotaVenta["direccion_cliente"]), 0, 0);
$pdf->setX(130);
$pdf->Cell(50, 5, utf8_decode("Fecha de emisión: ") . utf8_decode($NotaVenta["fecha_emision"]), 0, 1);
$pdf->setX(110);


$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(180, 5, "", 0, 1);

$pdf->SetFont('times', 'B', 11);


$pdf->Cell(33, 8, utf8_decode("EAN13"), 1, 0, "L");
$pdf->Cell(60, 8, "DETALLES", 1, 0, "C");
$pdf->Cell(14, 8, "DOC.", 1, 0, "C");
$pdf->Cell(14, 8, "UNID.", 1, 0, "C");
$pdf->Cell(15, 8, "P.UNIT.", 1, 0, "C");
$pdf->Cell(15, 8, "SubTot.", 1, 0, "C");
$pdf->Cell(15, 8, "DCTO.", 1, 0, "C");
$pdf->Cell(22, 8, "TOTAL", 1, 1, "C");


$pdf->SetFont("times", "", 11);
$pdf->setTextColor(0, 0, 0);
$total = 0;
foreach ($productos as $value) {
  $pdf->Cell(33, 8, utf8_decode($value["idProducto"]), 1, 0);
  $pdf->Cell(60, 8, utf8_decode($value["descProducto"]), 1, 0);
  $pdf->Cell(14, 8, $value["cantProducto"], 1, 0, "C");
  $pdf->Cell(14, 8, $value["cantProducto"], 1, 0, "C");
  $pdf->Cell(15, 8, $value["preUnitario"], 1, 0, "C");
  $pdf->Cell(15, 8, $value["preTotal"] . " Bs.", 1, 0, "C");
  $pdf->Cell(15, 8,  "0", 1, 0, "C");
  $pdf->Cell(22, 8, $value["preTotal"] . " Bs.", 1, 1, "C");
}
$pdf->SetX(10);
$pdf->SetFont("times", "B", 11);
$pdf->SetFillColor(225, 225, 225);

$pdf->Cell(93, 8, "TOTALES", 1, 0, "R",true);
$pdf->Cell(14, 8, "", 1, 0, "C");
$pdf->Cell(14, 8, "", 1, 0, "C");
$pdf->Cell(15, 8, "", 1, 0, "C");
$pdf->Cell(15, 8, "", 1, 0, "C");
$pdf->Cell(15, 8, "", 1, 0, "C");
$pdf->SetFont("times", "", 11);
$pdf->Cell(22, 8, $NotaVenta["total"] . " Bs.", 1, 1, "C");
$pdf->Cell(188, 8, "SON:", 1, 1, "L");
$pdf->Cell(188, 8, utf8_decode("Observación:"), 1, 1, "L");

/* 5TO FIRMAS */

$pdf->Ln(30);
$pdf->SetX(25);
$pdf->Cell(40, 8, "CLIENTE", "T", 0, "C");
/* $pdf->Cell(40, 8, "", 0, "C"); */
$pdf->SetX(85);
$pdf->Cell(40, 8, utf8_decode("ALMACÉN"), "T", 0, "C");
$pdf->SetX(145);
$pdf->Cell(40, 8, utf8_decode("ADMINISTRACIÓN"), "T", 0, "C");

$pdf->Output();
