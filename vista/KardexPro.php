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

// Obtención de datos de reporte.js -> kardexPro()
$idProducto = isset($_GET["producto"]) ? $_GET["producto"] : null;
$fechaInicial = isset($_GET["fechaInicial"]) ? $_GET["fechaInicial"] : null;
$fechaFinal = isset($_GET["fechaFinal"]) ? $_GET["fechaFinal"] : null;

// Obteniendo información del producto
$producto = ControladorProducto::ctrInfoProducto($idProducto);

//obteniendo informacion del stock para kardex por inventario por ITE
$stock_producto = ControladorProducto::ctrKardexFisico($fechaInicial, $fechaFinal, $idProducto);

//obteniendo el saldo del producto segun la fecha indicada
$saldo_producto = ControladorProducto::ctrSaldoProducto($fechaFinal, $idProducto);

      //calculando el saldo
$totIngresoSaldo=0;
$totSalidaSaldo=0;
foreach($saldo_producto as $val){
  if($val["movimiento"]=="ingreso"){
    $totIngresoSaldo=$totIngresoSaldo+$val["cantidad"];
  }else{
    $totSalidaSaldo=$totSalidaSaldo+$val["cantidad"];
  }
}

$saldo=$totIngresoSaldo-$totSalidaSaldo;
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
  ->setCellValue('J7', 'VALOR')
  ->setCellValue('C8', 'Saldo anterior al '.$fechaFinal)
  ->setCellValue('D8', '')//costo falta
  ->setCellValue('I8', $saldo)//cantidad
  ->setCellValue('J8', '');//valor falta

// Alineación y bordes de encabezados
$headerCells = 'A6:J7';
$sheet->getStyle($headerCells)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle($headerCells)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$sheet->getStyle($headerCells)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

// Datos
$data=[];
foreach ($stock_producto as $value) {
    if ($value["movimiento"] == "ingreso") {
        $data[] = [
            $value["codigo"],
            $value["create_at"],
            $value["concepto"],
            $value["costo"],
            $value["cantidad"],
            $value["cantidad"] * $value["costo"],
            '',
            '',
            '',
            ''
        ];
    } else {
        $data[] = [
            $value["codigo"],
            $value["create_at"],
            $value["concepto"],
            $value["costo"],
            '',
            '',
            $value["cantidad"],
            $value["cantidad"] * $value["costo"],
            '',
            ''
        ];
    }
}


$row = 9; // Empezar desde la fila 8 para los datos
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

// Ajustar automáticamente el ancho de las columnas A a J
foreach (range('A', 'J') as $columnID) {
  $sheet->getColumnDimension($columnID)->setAutoSize(true);
}

/*============================
  fin de datos en celdas
============================*/

// Sirve para descargar el reporte
$filename = str_replace([':', ' '], ['-', '_'], $fechaHoraActual) . '.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');


?>
