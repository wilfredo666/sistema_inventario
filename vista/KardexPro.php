<?php
require '../vendor/autoload.php';
require '../modelo/productoModelo.php';
require '../controlador/productoControlador.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

$spreadsheet = new Spreadsheet();

$spreadsheet->getProperties()->setCreator("Herment LTDA")->setTitle("Inventario de productos por ITE");
$sheet = $spreadsheet->setActiveSheetIndex(0);

$fechaHoraActual = date('Y-m-d H:i:s');

//obtencion de datos de reporte.js -> kardexPro()

  $producto = $_GET["producto"];
  $fechaInicial = $_GET["fechaInicial"];
  $fechaFinal = $_GET["fechaFinal"];

//obteniendo informacion del producto
$producto = ControladorProducto::ctrInfoProducto($producto);

//obteniendo informacion del stock
$stock_producto = ControladorProducto::ctrInfoStockProducto($producto);

/*===========================
  inicio de datos en celdas
============================*/

// Título del reporte
$sheet->mergeCells('A2:J2');
$sheet->setCellValue('A2', 'KARDEX FÍSICO');
$sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

// Período
$sheet->mergeCells('A3:J3');
$sheet->setCellValue('A3', 'Periodo: '.$fechaInicial.' AL '.$fechaFinal);
$sheet->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


// Información del producto
$sheet->mergeCells('A4:E4');
$sheet->setCellValue('A4', 'Código de Producto:'.$producto["nombre_producto"].' '.$producto["cod_producto"]);
$sheet->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

// Encabezados de la tabla y combinación de celdas verticalmente
$sheet->mergeCells('A6:A7')
  ->mergeCells('B6:B7')
  ->mergeCells('C6:C7')
  ->mergeCells('D6:D7')
  ->mergeCells('E6:F6')
  ->mergeCells('G6:H6')
  ->mergeCells('I6:J6')
  ->setCellValue('A6', 'No DOC')
  ->setCellValue('B6', 'FECHA Y HORA')
  ->setCellValue('C6', 'DESCRIPCIÓN')
  ->setCellValue('D6', 'COSTO UNITARIO')
  ->setCellValue('E6', 'ENTRADAS')
  ->setCellValue('E7', 'CANTIDAD')
  ->setCellValue('F7', 'VALOR')
  ->setCellValue('G6', 'SALIDAS')
  ->setCellValue('G7', 'CANTIDAD')
  ->setCellValue('H7', 'VALOR')
  ->setCellValue('I6', 'SALDOS')
  ->setCellValue('I7', 'CANTIDAD')
  ->setCellValue('J7', 'VALOR');

// Alineación y bordes de encabezados
$headerCells = 'A6:J7';
$sheet->getStyle($headerCells)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle($headerCells)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$sheet->getStyle($headerCells)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

// Datos de ejemplo
$data = [
  ['001', '12/12/2024 10:00:00', 'Compra inicial', '10.00', '100', '1000.00', '', '', '1000.00'],
  ['002', '15/12/2024 14:30:00', 'Venta', '10.00', '', '', '50', '500.00', '500.00'],
  // Agrega más filas según sea necesario
];

$row = 8; // Empezar desde la fila 8 para los datos
foreach ($data as $item) {
  $sheet->setCellValue('A' . $row, $item[0])
    ->setCellValue('B' . $row, $item[1])
    ->setCellValue('C' . $row, $item[2])
    ->setCellValue('D' . $row, $item[3])
    ->setCellValue('E' . $row, $item[4])
    ->setCellValue('F' . $row, $item[5])
    ->setCellValue('G' . $row, $item[6])
    ->setCellValue('H' . $row, $item[7])
    ->setCellValue('I' . $row, $item[8]);
  $row++;
}

// Ajustar automáticamente el ancho de las columnas A a I
foreach (range('A', 'J') as $columnID) {
  $sheet->getColumnDimension($columnID)->setAutoSize(true);
}

/*============================
  fin de datos en celdas
============================*/


/* Here there will be some code where you create $spreadsheet */
//sirve para descargar el reporte
// redirect output to client browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$fechaHoraActual.'.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

