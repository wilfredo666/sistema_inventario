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

/*===========================
para todos los productos
============================*/
if($idProducto==0){
  // Obtener el id de todos los productos
  $listaIdProductos = ControladorProducto::ctrListaIds();

  // Fila de inicio
  $startRow = 2;

  // Título del reporte
  $sheet->mergeCells("A$startRow:J$startRow");
  $sheet->setCellValue("A$startRow", "KARDEX FÍSICO");
  $sheet->getStyle("A$startRow")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
  $startRow++;

  // Período
  $sheet->mergeCells("A$startRow:J$startRow");
  $sheet->setCellValue("A$startRow", "Periodo: $fechaInicial AL $fechaFinal");
  $sheet->getStyle("A$startRow")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
  $startRow++;

  foreach ($listaIdProductos as $productoItem) {
    $idProducto = $productoItem["id_producto"];

    // Obtener información del producto
    $producto = ControladorProducto::ctrInfoProducto($idProducto);
    if (!$producto || !isset($producto["precio_costo"])) {
      continue; // Saltar si el producto no tiene datos válidos
    }

    // Precio unitario (por unidad)
    $precioDocena = $producto["precio_costo"];
    $precioUnitario = $precioDocena > 0 ? $precioDocena / 12 : 0;

    // Obtener movimientos (entradas/salidas) del kardex
    $movimientos = ControladorProducto::ctrKardexFisico($fechaInicial, $fechaFinal, $idProducto);

    // Obtener saldo anterior al periodo
    $saldoProducto = ControladorProducto::ctrSaldoProducto($fechaFinal, $idProducto);
    $totalIngresos = 0;
    $totalSalidas = 0;

    foreach ($saldoProducto as $mov) {
      if ($mov["movimiento"] == "ingreso") {
        $totalIngresos += $mov["cantidad"];
      } else {
        $totalSalidas += $mov["cantidad"];
      }
    }

    $saldo = $totalIngresos - $totalSalidas;
    $costoTotalSaldo = $precioUnitario * $saldo;

    // ===========================
    // Inicio de escritura en hoja
    // ===========================


    // Información del producto
    $sheet->mergeCells("A$startRow:E$startRow");
    $sheet->setCellValue("A$startRow", "Código de Producto: {$producto["nombre_producto"]} {$producto["cod_producto"]}");
    $sheet->getStyle("A$startRow")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $startRow += 2;

    // Encabezados
    $sheet->mergeCells("A$startRow:A" . ($startRow + 1))
      ->mergeCells("B$startRow:B" . ($startRow + 1))
      ->mergeCells("C$startRow:C" . ($startRow + 1))
      ->mergeCells("D$startRow:D" . ($startRow + 1))
      ->mergeCells("E$startRow:F$startRow")
      ->mergeCells("G$startRow:H$startRow")
      ->mergeCells("I$startRow:J$startRow")
      ->setCellValue("A$startRow", "No DOC")
      ->setCellValue("B$startRow", "FECHA Y HORA")
      ->setCellValue("C$startRow", "DESCRIPCIÓN")
      ->setCellValue("D$startRow", "COSTO X DOCENA")
      ->setCellValue("E$startRow", "ENTRADAS")
      ->setCellValue("E" . ($startRow + 1), "CANTIDAD")
      ->setCellValue("F" . ($startRow + 1), "VALOR")
      ->setCellValue("G$startRow", "SALIDAS")
      ->setCellValue("G" . ($startRow + 1), "CANTIDAD")
      ->setCellValue("H" . ($startRow + 1), "VALOR")
      ->setCellValue("I$startRow", "SALDOS")
      ->setCellValue("I" . ($startRow + 1), "CANTIDAD")
      ->setCellValue("J" . ($startRow + 1), "VALOR");

    // Saldo anterior
    $sheet->setCellValue("C" . ($startRow + 2), "Saldo anterior al $fechaInicial")
      ->setCellValue("D" . ($startRow + 2), $precioDocena)
      ->setCellValue("I" . ($startRow + 2), $saldo)
      ->setCellValue("J" . ($startRow + 2), $costoTotalSaldo);

    // Estilos
    $headerCells = "A$startRow:J" . ($startRow + 1);
    $sheet->getStyle($headerCells)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle($headerCells)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    $sheet->getStyle($headerCells)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

    // Cuerpo del reporte
    $data = [];
    $saldoActual = $saldo;

    foreach ($movimientos as $movimiento) {
      if ($movimiento["movimiento"] == "ingreso") {
        $saldoActual += $movimiento["cantidad"];
        $data[] = [
          $movimiento["codigo"],
          $movimiento["create_at"],
          $movimiento["concepto"],
          $precioDocena,
          $movimiento["cantidad"],
          $movimiento["cantidad"] * $precioUnitario,
          '',
          '',
          $saldoActual,
          $saldoActual * $precioUnitario
        ];
      } else {
        $saldoActual -= $movimiento["cantidad"];
        $data[] = [
          $movimiento["codigo"],
          $movimiento["create_at"],
          $movimiento["concepto"],
          $precioDocena,
          '',
          '',
          $movimiento["cantidad"],
          $movimiento["cantidad"] * $precioUnitario,
          $saldoActual,
          $saldoActual * $precioUnitario
        ];
      }
    }

    // Escribir datos en el Excel
    $row = $startRow + 3;
    foreach ($data as $item) {
      $sheet->setCellValue("A$row", $item[0])
        ->setCellValue("B$row", $item[1])
        ->setCellValue("C$row", $item[2])
        ->setCellValue("D$row", $item[3])
        ->setCellValue("E$row", $item[4])
        ->setCellValue("F$row", $item[5])
        ->setCellValue("G$row", $item[6])
        ->setCellValue("H$row", $item[7])
        ->setCellValue("I$row", $item[8])
        ->setCellValue("J$row", $item[9]);
      $row++;
    }

    // Ajuste automático del ancho de columnas
    foreach (range('A', 'J') as $columnID) {
      $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Preparar para el siguiente producto
    $startRow = $row + 1;
  }

}else{
  /*=====================
  para un solo producto
  ======================*/

  // Obteniendo información del producto: tabla->producto
  $producto = ControladorProducto::ctrInfoProducto($idProducto);

  //obteniendo informacion del stock para kardex por inventario por ITE: tablas -> ingreso_producto, salida_producto
  //ojo.- toma el costo que se uso al momento de registrar la salida o entrada (puede ser costo o precio venta)
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

  //calculando el costo total para el saldo: costo por docena /12 -> precio unitario
  $costo_total=($producto["precio_costo"]/12)*$saldo;

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
    ->setCellValue('D6', 'COSTO X DOCENA')
    ->setCellValue('E6', 'ENTRADAS')
    ->setCellValue('E7', 'CANTIDAD')
    ->setCellValue('F7', 'VALOR')
    ->setCellValue('G6', 'SALIDAS')
    ->setCellValue('G7', 'CANTIDAD')
    ->setCellValue('H7', 'VALOR')
    ->setCellValue('I6', 'SALDOS')
    ->setCellValue('I7', 'CANTIDAD')
    ->setCellValue('J7', 'VALOR')
    ->setCellValue('C8', 'Saldo anterior al '.$fechaInicial)
    ->setCellValue('D8', $producto["precio_costo"])//costo x docena
    ->setCellValue('I8', $saldo)//cantidad en unidades
    ->setCellValue('J8', $costo_total);//valor

  // Alineación y bordes de encabezados
  $headerCells = 'A6:J7';
  $sheet->getStyle($headerCells)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
  $sheet->getStyle($headerCells)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
  $sheet->getStyle($headerCells)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

  // Datos
  $data=[];
  $saldo_actual=$saldo;
  foreach ($stock_producto as $value) {
    if ($value["movimiento"] == "ingreso") {
      $data[] = [
        $value["codigo"],
        $value["create_at"],
        $value["concepto"],
        $producto["precio_costo"],
        $value["cantidad"],
        $value["cantidad"] * ($producto["precio_costo"]/12),//valor entrada
        '',
        '',
        $saldo_actual=$saldo_actual+$value["cantidad"], //saldo cantidad
        $saldo_actual*($producto["precio_costo"]/12)//saldo valor
      ];
    } else {
      $data[] = [
        $value["codigo"],
        $value["create_at"],
        $value["concepto"],
        $producto["precio_costo"],
        '',
        '',
        $value["cantidad"],
        $value["cantidad"] * ($producto["precio_costo"]/12),//valor salida
        $saldo_actual=$saldo_actual-$value["cantidad"], //saldo cantidad
        $saldo_actual * ($producto["precio_costo"]/12) //saldo valor
      ];
    }

  }


  $row = 9; // Empezar desde la fila 9 para los datos
  foreach ($data as $item) {
    $sheet->setCellValue('A' . $row, $item[0])
      ->setCellValue('B' . $row, $item[1])
      ->setCellValue('C' . $row, $item[2])
      ->setCellValue('D' . $row, $item[3])
      ->setCellValue('E' . $row, $item[4])
      ->setCellValue('F' . $row, $item[5])
      ->setCellValue('G' . $row, $item[6])
      ->setCellValue('H' . $row, $item[7])
      ->setCellValue('I' . $row, $item[8])
      ->setCellValue('J' . $row, $item[9]);
    $row++;
  }

  // Ajustar automáticamente el ancho de las columnas A a J
  foreach (range('A', 'J') as $columnID) {
    $sheet->getColumnDimension($columnID)->setAutoSize(true);
  }

  /*============================
  fin de datos en celdas
============================*/
}


// Sirve para descargar el reporte
$filename = str_replace([':', ' '], ['-', '_'], $fechaHoraActual) . '.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

?>
