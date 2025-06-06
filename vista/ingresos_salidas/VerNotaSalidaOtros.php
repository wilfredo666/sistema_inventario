<?php

require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";

$id = $_GET["id"];

$notaSalida = ControladorVenta::ctrInfoNotaSalidaOtros($id);
$productos = json_decode($notaSalida["detalle_salida_otros"], true);

?>
<div class="modal-header">
  <h4 class="modal-title">Información de Nota de Salida</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <tr>
          <th>#Cod. Nota de Salida</th>
          <td><?php echo $notaSalida["codigo_salida_otros"]; ?></td>
        </tr>

        <tr>
          <th>Total Salida</th>
          <td><?php echo $notaSalida["total_salida_otros"] . " Bs." ?></td>
        </tr>

        <tr>
          <th>Fecha</th>
          <td><?php echo $notaSalida["fecha_salida_otros"]; ?></td>
        </tr>

        <tr>
          <th>Estado</th>
          <td><?php
              if ($notaSalida["estado_salida_otros"] == 0) {
              ?>
              <span class="badge badge-danger">Anulado</span>
            <?php
              } else {
            ?>
              <span class="badge badge-success">Aceptado</span>
            <?php
              } ?>
          </td>
        </tr>

      </table>
    </div>
  </div>

  <div class="col-sm-12">
    <table class="table">
      <thead class="bg-gradient-dark text-center">
        <th>Producto</th>
        <th>Docenas</th>
        <th>Unidades</th>
        <th>P/Docena</th>
        <th>SubTotal</th>
        <th>Liq.Pagable</th>
      </thead>
      <tbody>
        <?php
        foreach ($productos as $producto) {
          $precioUnidad = $producto['costoProducto'] / 12;
          $totalUnidad = ($producto['cantProdDocena'] * 12) + $producto['cantProdUnidad'];
          $subTotal = $totalUnidad * $precioUnidad;

          $liquidoNeto = $subTotal - (($subTotal * $producto['descuentoCliente']) / 100);

        ?>
          <tr class="text-center">
            <td><?php echo $producto['descProducto'] ?></td>
            <td><?php echo $producto['cantProdDocena'] ?></td>
            <td><?php echo $producto['cantProdUnidad'] ?></td>
            <td><?php echo $producto['costoProducto'] ?></td>
            <td><?php echo number_format(round($subTotal, 2), 2) ?></td>
            <td><?php echo number_format(round($liquidoNeto, 2), 2) ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      <tfoot class="text-center">
        <th></th>
        <th></th>
        <th></th>
        <th>TOTALES</th>
        <th><?php echo $notaSalida["total_salida_otros"] . " Bs."; ?></th>
        <th></th>
        <th class="text-center"><?php echo $notaSalida["total_salida_otros"] . " Bs."; ?></th>
      </tfoot>
    </table>
  </div>

</div>