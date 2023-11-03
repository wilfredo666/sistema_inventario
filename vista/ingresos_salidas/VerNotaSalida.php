<?php

require_once "../../controlador/ventaControlador.php";
require_once "../../modelo/ventaModelo.php";

$id = $_GET["id"];

$notaSalida = ControladorVenta::ctrInfoNotaSalida($id);
$productos = json_decode($notaSalida["detalle_venta"], true);
?>
<div class="modal-header">
  <h4 class="modal-title">Información detalle de Venta</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <tr>
          <th>#Cod. Nota de Venta</th>
          <td><?php echo $notaSalida["codigo_venta"]; ?></td>
        </tr>

        <tr>
          <th>Cliente</th>
          <td><?php echo $notaSalida["razon_social_cliente"]; ?></td>
        </tr>

        <tr>
          <th>% de Descuento del Cliente</th>
          <td><?php echo $notaSalida["descuento"] . " %" ?></td>
        </tr>

        <tr>
          <th>Fecha</th>
          <td><?php echo $notaSalida["fecha_emision"]; ?></td>
        </tr>

        <tr>
          <th>Estado</th>
          <td><?php
              if ($notaSalida["estado_venta"] == 0) {
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
        <th>Descuento</th>
        <th>Liq.Pagable</th>
      </thead>
      <tbody>
        <?php
        foreach ($productos as $producto) {
          $precioUnidad = $producto['costoProducto'] / 12;
          $totalUnidad = ($producto['cantProdDocena'] * 12) + $producto['cantProdUnidad'];
          $subTotal = $totalUnidad * $precioUnidad;

          $liquidoNeto = $subTotal - (($subTotal*$producto['descuentoCliente'])/100);

        ?>
          <tr  class="text-center">
            <td><?php echo $producto['descProducto'] ?></td>
            <td><?php echo $producto['cantProdDocena'] ?></td>
            <td><?php echo $producto['cantProdUnidad'] ?></td>
            <td><?php echo $producto['costoProducto'] ?></td>
            <td><?php echo number_format(round($subTotal, 2),2) ?></td>
            <td><?php echo $producto['descuentoCliente'] . " %" ?></td>
            <td><?php echo number_format(round($liquidoNeto,2),2) ?></td>
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
        <th><?php echo $notaSalida["total"] . " Bs."; ?></th>
        <th></th>
        <th class="text-center"><?php echo $notaSalida["neto"] . " Bs."; ?></th>
      </tfoot>
    </table>
  </div>

</div>